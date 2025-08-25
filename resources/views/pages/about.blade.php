@extends('pages.layouts.app')
@section('title', 'عن الموقع')

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="#">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> عن الموقع </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title">عن MediTrack </h1>
    </div>

    <section class="hero py-5">
        <div class="text-center">
            <img src="img/about.png" alt="" class="img-fluid">
        </div>

        <div class="container my-5 text-end" style="margin-right: 200px;">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <a href="#what-is" class="text-decoration-none text-dark">
                        <h5 class="text-primary d-inline-block">
                            <i class="fas fa-dot-circle me-2"></i> ما هو MediTrack؟
                        </h5>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#why-created" class="text-decoration-none text-dark">
                        <h5 class="text-primary d-inline-block">
                            <i class="fas fa-dot-circle me-2"></i> لماذا تم إنشاؤه؟
                        </h5>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#how-it-helps" class="text-decoration-none text-dark">
                        <h5 class="text-primary d-inline-block">
                            <i class="fas fa-dot-circle me-2"></i> كيف يساعدك MediTrack؟
                        </h5>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#what-distinguishes" class="text-decoration-none text-dark">
                        <h5 class="text-primary d-inline-block">
                            <i class="fas fa-dot-circle me-2"></i> ما الذي يميز MediTrack؟
                        </h5>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <div class="container my-5 text-end" style="margin-right: 200px;">
        <div class="mb-5" id="what-is">
            <h2>ما هو MediTrack؟</h2>
            <p>
                هو نظام صيدلة إلكترونية يخدم سكان غزة. يسهّل الوصول إلى الأدوية،
                وينظم العلاقة بين المريض والطبيب، ويوفر أدوات طبية مهمة مثل الإسعافات
                الأولية.
            </p>
        </div>

        <div class="mb-5" id="why-created">
            <h2>لماذا تم إنشاؤه؟</h2>
            <p>لأن القطاع الصحي في غزة يعاني من:</p>
            <ul class="list-unstyled">
                <li><i class="fas fa-dot-circle me-2 text-primary"></i> نقص في الأدوية</li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> صعوبة تنقل المرضى
                </li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> ضعف التنسيق بين
                    الجهات الصحية
                </li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> غياب أرشفة طبية
                    منظمة
                </li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> تأخر الاستجابة في
                    الطوارئ
                </li>
            </ul>
            <p>يوفر حل رقمي فعال لتجاوز هذه التحديات MediTrack.</p>
        </div>

        <div class="mb-5" id="how-it-helps">
            <h2>كيف يساعدك MediTrack؟</h2>
            <div class="row">
                <div class="col-md-6 text-end mb-4 mb-md-0">
                    <h4>إذا كنت مريض:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> ابحث عن الأدوية
                        </li>
                        <li><i class="fas fa-dot-circle me-2 text-primary"></i> اطلبها من مكانك</li>
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> تابع حالتك الصحية
                        </li>
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> استعرض وصفاتك السابقة
                        </li>
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> تعلم الإسعافات الأولية
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-end">
                    <h4>إذا كنت طبيب:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> سجل وصفاتك إلكترونياً
                        </li>
                        <li><i class="fas fa-dot-circle me-2 text-primary"></i> راقب الحالات بسهولة</li>
                        <li><i class="fas fa-dot-circle me-2 text-primary"></i> نظم ملفات المرضى</li>
                        <li>
                            <i class="fas fa-dot-circle me-2 text-primary"></i> تواصل مع الصيدليات بوضوح
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="what-distinguishes">
            <h2>ما الذي يميز MediTrack؟</h2>
            <ul class="list-unstyled">
                <li><i class="fas fa-dot-circle me-2 text-primary"></i> واجهة بسيطة</li>
                <li><i class="fas fa-dot-circle me-2 text-primary"></i> نظام عربي بالكامل</li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> متجاوب مع جميع الأجهزة
                </li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> يحافظ على بيانات المستخدم
                </li>
                <li>
                    <i class="fas fa-dot-circle me-2 text-primary"></i> يدعم العمل الإنساني والطوارئ
                </li>
            </ul>
        </div>
    </div>
@endsection