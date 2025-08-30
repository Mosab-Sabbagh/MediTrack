<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // الصفحة الرئيسية للطبيب

    public function index()
    {
        return view('doctor.index');
    }


    // صفحة الأدوية مع خاصية البحث للدكتور
    public function medications(Request $request)
    {
        $query = $request->input('search');
        if ($query) {
            $medicines = Medicine::where('name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $medicines = Medicine::all();
        }
        return view('doctor.medications', compact('medicines'));
    }

    // صفحة المرضى مع خاصية البحث
    public function patients(Request $request)
    {
        $q = trim($request->get('q', ''));

        $patients = Patient::with('user')
            ->when($q, function ($query) use ($q) {
                $query->whereHas('user', function ($userQuery) use ($q) {
                    $userQuery->where('name', 'like', "%{$q}%");
                })
                    ->orWhere('phone', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('doctor.patients', compact('patients', 'q'));
    }

    // عرض نموذج إنشاء مريض جديد
    public function create()
    {
        return view('doctor.create');
    }

    // حفظ مريض جديد
    public function storePatient(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'date_of_birth' => 'nullable|date',
            'gender'     => 'nullable|in:male,female',
            'id_number'  => 'nullable|string|max:50',
            'phone'      => 'nullable|string|max:20',
        ]);

        // إنشاء user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'user_type' => 'sick', // نوع المستخدم مريض
        ]);

        // إنشاء patient وربطه بـ user
        $patient = Patient::create([
            'user_id'   => $user->id,
            'date_of_birth' => $request->date_of_birth,
            'gender'    => $request->gender,
            'id_number' => $request->id_number,
            'phone'     => $request->phone,
            'notes'     => $request->notes,
        ]);

        // ربط المريض بالطبيب الحالي
        $doctor = Auth::user()->doctor;
        if ($doctor) {
            $doctor->patients()->attach($patient->id, [
                'visit_date' => now(),
                'notes'      => $request->notes,
            ]);
        }

        return redirect()->route('doctor.patients')->with('success', 'تمت إضافة المريض بنجاح');
    }

    // إضافة زيارة جديدة لمريض
    public function createVisit(Patient $patient)
    {
        return view('doctor.create_visit', compact('patient'));
    }

    // حفظ الزيارة الجديدة
    public function storeVisit(Request $request, Patient $patient)
    {
        $request->validate([
            'visit_date' => 'nullable|date',
            'notes'      => 'nullable|string',
        ]);

        $doctor = Auth::user()->doctor;
        if ($doctor) {
            $doctor->patients()->attach($patient->id, [
                'visit_date' => $request->visit_date ?? now(),
                'notes'      => $request->notes,
            ]);
        }

        return redirect()->route('doctor.patients')
            ->with('success', 'تم إضافة الزيارة بنجاح');
    }

    // عرض تفاصيل المريض مع زياراته ووصفاته
    public function patientShow(Patient $patient)
    {
        // حمّل العلاقات المطلوبة
        $patient->load([
            'user',
            'doctors.user', // لعرض اسم الطبيب في الزيارات
            'medicines'     // سنجلب أسم الطبيب الواصف أدناه
        ]);

        // جهّز فهرس للأطباء الذين كتبوا وصفات للمريض (من medicine_patient.doctor_id)
        $doctorIds = $patient->medicines->pluck('pivot.doctor_id')->unique()->filter();
        $prescribers = Doctor::with('user')
            ->whereIn('id', $patient->medicines->pluck('pivot.doctor_id'))
            ->get()
            ->keyBy('id');


        // (اختياري) معرّف الطبيب الحالي
        $myDoctorId = Auth::user()->doctor->id ?? null;

        return view('doctor.patients_show', compact('patient', 'prescribers', 'myDoctorId'));
    }

    // صفحة إنشاء وصفة طبية جديدة لمريض
    public function createPrescribe(Patient $patient)
    {
        $medicines = Medicine::all();
        return view('doctor.create_recipe', compact('patient', 'medicines'));
    }

    // حفظ الوصفة الطبية الجديدة
    public function prescribe(Request $request, $patientId)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'diagnosis'   => 'nullable|string',
            'notes'       => 'nullable|string',
        ]);

        $patient = Patient::findOrFail($patientId);

        $patient->medicines()->attach($request->medicine_id, [
            'doctor_id'    => Auth::id(),
            'diagnosis'    => $request->diagnosis,
            'notes'        => $request->notes,
            'prescribed_at' => now(),
        ]);

        return redirect()->route('doctor.patients')->with('success', 'تم إضافة الوصفة بنجاح');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('doctor.editProfile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Doctor::where('user_id', $id)->update([
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'license_number' => $request->license_number,
            'working_hours' => $request->working_hours,
            'section' => $request->section,
        ]);
        return redirect()->route('doctor.index')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
