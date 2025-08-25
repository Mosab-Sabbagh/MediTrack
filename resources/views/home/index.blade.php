@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="row align-items-center gy-4 text-right">
                <div class="col-lg-6">
                    <div class="p-4 p-lg-5 cardContent">
                        <h1 class="mb-3">منصّة MediTrack الذكية</h1>
                        <p class="mb-3">نظام صيدلية إلكترونية يساعدك في الوصول السريع والآمن للأدوية في غزة.</p>
                        <p class="mb-3">بسبب الحروب المستمرة، يعاني الناس من نقص الدواء وتأخر في الحصول عليه.</p>
                        <p class="mb-3">MediTrack جاء ليسد هذه الفجوة</p>
                        <p class="mb-3">يوفر النظام:</p>
                        <ul class="mb-4 p-4 rounded-3">
                            <li>قاعدة بيانات دقيقة للأدوية</li>
                            <li>سهولة في طلب الدواء ومتابعة حالته</li>
                            <li>دعم للمنظمات الطبية في الطوارئ</li>
                            <li>حماية للمعلومات الصحية عبر نظام آمن</li>
                        </ul>
                        <p class="mb-3">هدفنا دعم صمود الناس، وتحسين الرعاية رغم الظروف الصعبة.ابدأ الآن، وخلي صحتك أقوى.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="photo text-center text-lg-end">
                        <img src="img/dr.png" alt="طبيب" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="startSection py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">ابدأ من هنا</h2>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8 mb-4 m-4">
                    <div class="start-card text-center p-4">
                        <div class="icon-circle mb-3">
                            <img src="img/doctor 1.png" alt="طبيب" class="img-fluid">
                        </div>
                        <h5 class="fw-bold mb-3">الدخول كطبيب</h5>
                        <p class="text-muted">إدارة وصفات المرضى، متابعة الأدوية، وتحديث السجلات الطبية.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-8 mb-4 m-4">
                    <div class="start-card text-center p-4">
                        <div class="icon-circle mb-3">
                            <img src="img/doctor 2.png" alt="مريض" class="img-fluid">
                        </div>
                        <h5 class="fw-bold mb-3">الدخول كمريض</h5>
                        <p class="text-muted">طلب الأدوية، متابعة حالتك الصحية، واستعراض وصفاتك السابقة.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-8 mb-4 m-4">
                    <a href="{{route('first_aid')}}" class="text-decoration-none">
                        <div class="start-card text-center p-4">
                            <div class="icon-circle mb-3">
                                <img src="img/medical_bag.png" alt="حقيبة الاسعافات" class="img-fluid">
                            </div>
                            <h5 class="fw-bold mb-3"> الاسعافات الأولية</h5>
                            <p class="text-muted">تعلم خطوات الطوارئ السريعة لإنقاذ الحياة قبل وصول المساعدة.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="aboutSection py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="about-card p-5">
                        <h2 class="fw-bold text-center mb-4">عن MediTrack</h2>
                        <p class="fw-bold fs-5 mb-4">
                            هو نظام صيدلة إلكترونية يخدم سكان غزة، يهدف لتسهيل الوصول إلى الأدوية رغم التحديات الناتجة عن
                            الحرب والحصار.
                        </p>
                        <p class="fw-bold fs-5 mb-4">
                            يوفر النظام خدمات مثل:
                            <br>
                            طلب الدواء أونلاين، تتبع الحالة الصحية، إدارة وصفات المرضى، ودعم الطوارئ.
                            يساعد على تقليل الأخطاء الطبية، يسهل التواصل بين المريض والطبيب، يحفظ البيانات بشكل آمن، ويدعم
                            العمل الإنساني في الظروف الطارئة.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection