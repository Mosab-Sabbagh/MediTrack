@extends('pages.layouts.app')
@section('title', 'لوحة تحكم الطبيب')
@section('content')
    <div class="text-center mt-5">
        <h1 class="title">مرحبا دكتور/ة {{Auth::user()->name}}</h1>
    </div>

    <section class="py-5">
        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="max-width: 900px; background-color: #f8f9fa;">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center mb-3 mb-md-0">
                        <img src="img/doctor3.png" class="img-fluid rounded-4" alt="Doctor profile picture">
                    </div>
                    <div class="col-md-7 text-end">
                        <ul class="list-unstyled fw-bold mb-0">
                            <li class="mb-2">الاسم: {{ Auth::user()->name }}</li>
                            <li class="mb-2">التخصص: {{ Auth::user()->doctor?->specialization ?? '---' }}</li>
                            <li class="mb-2">رقم الترخيص: {{ Auth::user()->doctor?->license_number ?? '---' }}</li>
                            <li class="mb-2">البريد الإلكتروني: {{ Auth::user()->email }}</li>
                            <li class="mb-2">رقم الهاتف: {{ Auth::user()->doctor?->phone ?? '---' }}</li>
                            <li class="mb-2">ساعات العمل: {{ Auth::user()->doctor?->working_hours ?? '---' }}</li>
                            <li class="mb-2">القسم: {{ Auth::user()->doctor?->section ?? '---' }}</li>
                            <li class="mb-2">تاريخ الانضمام: {{ Auth::user()->created_at->format('d-m-Y') }}</li>
                        </ul>

                        @if(
                                !Auth::user()->doctor ||
                                empty(Auth::user()->doctor->specialization) ||
                                empty(Auth::user()->doctor->working_hours) ||
                                empty(Auth::user()->doctor->section) ||
                                empty(Auth::user()->doctor->license_number)
                            )
                            <div class="alert alert-warning text-center">
                                <a href="{{ route('doctor.edit', Auth::user()->id) }}" class="alert-link">
                                    الرجاء إكمال ملفك الشخصي قبل المتابعة
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="text-center">
            <h1 class=""> ماذا تريد أن تعرض؟</h1>
        </div>

        <div class="container my-5 text-center">
            <div class="row g-4 justify-content-center">
                <div class="card p-4 rounded-5 shadow-sm col-lg-3 col-md-6 col-sm-8 mb-4 m-4">
                    <div class="start-card text-center p-4 d-flex flex-column align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center mb-3"
                            style="background-color: #1364FF; width: 80px; height: 80px;">
                            <img src="img/دواء-دكتور.png" alt="" class="img-fluid" style="max-width: 60%; max-height: 60%;">
                        </div>
                        <h5 class="fw-bold mb-3">الأدوية</h5>
                        <p class="text-muted"> عرض قائمة الأدوية والتحكم في تفاصيلها
                        </p>
                        <a href="{{route('doctor.medications')}}" class="btn btn-primary mt-auto w-100 rounded-5">عرض</a>
                    </div>
                </div>

                <div class="card p-4 rounded-5 shadow-sm col-lg-3 col-md-6 col-sm-8 mb-4 m-4">
                    <div class="start-card text-center p-4 d-flex flex-column align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center mb-3"
                            style="background-color: #1364FF; width: 80px; height: 80px;">
                            <img src="{{asset('img/مريض-دكتور.png')}}" alt="" class="img-fluid"
                                style="max-width: 60%; max-height: 60%;">
                        </div>
                        <h5 class="fw-bold mb-3">المرضى</h5>
                        <p class="text-muted"> تصفح معلومات المرضى والتفاصيل الطبية </p>
                        <a href="{{route('doctor.patients')}}" class="btn btn-primary mt-auto w-100 rounded-5">عرض</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection