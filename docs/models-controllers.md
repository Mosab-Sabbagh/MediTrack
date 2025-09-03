## توثيق المودلز والكونترولرز والعلاقات

هذه الصفحة تلخّص المودلز (Models) والكونترولرز (Controllers) والعلاقات فيما بينها داخل مشروع MediTrack.

### المودلز (Models)

- **User**
  - الحقول الأساسية: `name`, `email`, `password`, `user_type` (doctor | sick | pharmaceutical)
  - العلاقات:
    - `doctor()`: علاقة One-to-One → مستخدم واحد قد يكون له سجل طبيب واحد في `Doctor`.
    - `patient()`: علاقة One-to-One → مستخدم واحد قد يكون له سجل مريض واحد في `Patient`.

- **Doctor**
  - الحقول الأساسية: `user_id`, `specialization`, `phone`, `license_number`, `working_hours`, `section`
  - العلاقات:
    - `user()`: علاقة BelongsTo مع `User` (كل طبيب مرتبط بمستخدم).
    - `patients()`: علاقة Many-to-Many مع `Patient` عبر جدول وسيط `doctor_patient` مع حقول إضافية في البايفوت: `visit_date`, `notes`.
    - `medicines()`: علاقة HasManyThrough إلى `Medicine` عبر `MedicinePatient` (تجلب الأدوية المرتبطة بوصفات الطبيب عبر جدول `medicine_patient`).
    - ملاحظة: توجد دالة `medicationDoctors()` حالياً تشير إلى علاقة `belongsToMany(User::class, 'medicine_patient', 'patient_id', 'doctor_id')` داخل `Doctor`، تبدو غير متسقة مع اسمها وقد تحتاج مراجعة لأن مدلولها أقرب لربط المرضى/الأطباء عبر وصفات.

- **Patient**
  - الحقول الأساسية: `name`, `date_of_birth`, `gender`, `user_id`, `phone`, `id_number`
  - العلاقات:
    - `user()`: علاقة BelongsTo مع `User`.
    - `doctors()`: علاقة Many-to-Many مع `Doctor` عبر `doctor_patient` مع بايفوت: `visit_date`, `notes`.
    - `medicines()`: علاقة Many-to-Many مع `Medicine` عبر `medicine_patient` مع بايفوت: `doctor_id`, `diagnosis`, `notes`, `prescribed_at`.
  - خصائص محسوبة:
    - `age` (Accessor: `getAgeAttribute`) لحساب العمر من `date_of_birth`.

- **Medicine**
  - الحقول الأساسية: `name`, `quantity`, `price`, `expiry_date`, `status`
  - العلاقات:
    - `patients()`: علاقة Many-to-Many مع `Patient` عبر `medicine_patient` مع بايفوت: `doctor_id`, `diagnosis`, `notes`, `prescribed_at`.

- **MedicinePatient** (موديل للجدول الوسيط `medicine_patient`)
  - الحقول الأساسية: `patient_id`, `medicine_id`, `doctor_id`, `dosage`, `duration`, `prescribed_date`, `notes`
  - يستخدم كجدول محوري لتخزين تفاصيل الوصفة بين المريض والدواء مع تحديد الطبيب الواصف.

### العلاقات (نظرة عامة)

- User 1—1 Doctor
- User 1—1 Patient
- Doctor M—N Patient عبر `doctor_patient` (مع `visit_date`, `notes`).
- Patient M—N Medicine عبر `medicine_patient` (مع `doctor_id`, `diagnosis`, `notes`, `prescribed_at`).
- Doctor ↔ Medicine (غير مباشرة) عبر وصفات `medicine_patient`.

### الكونترولرز (Controllers)

- **Auth/AuthenticatedController**
  - `create()`: إظهار فورم تسجيل الدخول.
  - `store(Request)`: تسجيل الدخول وتوجيه حسب `user_type` إلى لوحات: الطبيب/المريض/الصيدلي.
  - `destroy(Request)`: تسجيل الخروج وتنظيف الجلسة.

- **Auth/RegisteredUserController**
  - `create()`: إظهار فورم التسجيل.
  - `store(Request)`: إنشاء مستخدم جديد وفق `user_type`، وإذا كان طبيباً يتم إنشاء سجل في `Doctor`، ثم تسجيل الدخول للمستخدم.

- **Auth/PasswordResetController**
  - `showRequestForm()`: فورم طلب إعادة تعيين كلمة المرور.
  - `sendResetLink(Request)`: إنشاء/تحديث توكن لإعادة التعيين وتسجيل الرابط في السجلات (Log).
  - `showResetForm($token)`: عرض صفحة إعادة التعيين بناءً على التوكن.
  - `resetPassword(Request)`: التحقق وتحديث كلمة المرور وحذف سجل التوكن.

- **DoctorController**
  - `index()`: الصفحة الرئيسية للطبيب.
  - `medications(Request)`: عرض/البحث في الأدوية (`Medicine`).
  - `patients(Request)`: قائمة المرضى مع بحث حسب اسم المستخدم أو الهاتف، مع تحميل علاقة `user`.
  - `create()`: عرض نموذج إنشاء مريض جديد (إنشاء `User` بنوع sick ثم `Patient`).
  - `storePatient(Request)`: إنشاء مستخدم/مريض جديد وربطه بالطبيب الحالي عبر `doctor_patient`.
  - `createVisit(Patient)`: عرض نموذج إضافة زيارة جديدة لمريض.
  - `storeVisit(Request, Patient)`: حفظ زيارة جديدة في بايفوت علاقة الطبيب-المريض.
  - `patientShow(Patient)`: عرض تفاصيل المريض مع زياراته ووصفاته، وتحميل الأطباء الواصفين من `medicine_patient.doctor_id`.
  - `createPrescribe(Patient)`: عرض نموذج إنشاء وصفة طبية.
  - `prescribe(Request, $patientId)`: ربط المريض بدواء عبر `medicine_patient` مع تفاصيل الوصفة والطبيب الواصف.
  - `edit($id)`: عرض تعديل ملف الطبيب.
  - `update(Request, $id)`: تحديث بيانات الطبيب حسب `user_id`.

- **MedicineController**
  - `index()`: الصفحة الرئيسية لقسم الصيدلية.
  - `medications(Request)`: قائمة/بحث الأدوية.
  - `create()`: فورم إضافة دواء.
  - `store(Request)`: إنشاء دواء جديد مع تحقق من المدخلات.
  - `edit($id)`: عرض تعديل دواء.
  - `update(Request, $id)`: تحديث بيانات الدواء.
  - `destroy($id)`: حذف دواء.

- **SickController**
  - `index()`: صفحة المريض الحالية (من المستخدم المسجل)، تحميل علاقات: بيانات المستخدم، زيارات الأطباء، الأدوية الموصوفة، وجلب الأطباء الواصفين عبر `doctor_id` من `medicine_patient`.

### ملاحظات ومقترحات سريعة

- يفضّل توحيد أسماء الحقول في البايفوت بين النماذج المختلفة: `prescribed_at` في `Patient::medicines()` يقابله `prescribed_date` في `MedicinePatient`؛ يمكن اختيار واحد فقط لتجنب الالتباس.
- الدالة `medicationDoctors()` داخل `Doctor` تبدو غير مستخدمة وقد تكون في غير مكانها؛ راجع الغرض منها أو انقلها/عدّلها لتوضيح علاقتها الفعلية.
- تأكد من استخدام `Auth::user()->doctor->id` عند الحاجة إلى معرف الطبيب وليس `Auth::id()` عند الحفظ في `medicine_patient.doctor_id`، إلا إذا كان المقصود تخزين معرف المستخدم.


