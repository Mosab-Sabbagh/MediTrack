@extends('pages.layouts.app')
@section('title', 'الأقسام')

@section('content')

    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="#">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> الأقسام </a>
        </div>
    </div>

    <section class="container py-5">
        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="width: 700px; background-color: #f8f9fa;">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-6 text-center text-md-end">
                        <h2 class="mb-3">الأدوية</h2>
                        <p class="mb-4 fw-bold">إدارة وتحديث قائمة الأدوية المتوفرة</p>
                        <a href="#" class="btn btn-primary btn-lg px-4">دخول</a>
                    </div>
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 200px; height: 200px; background-color: #DEE9FF; overflow: hidden;">
                            <img src="img/جوال_و_دواء-removebg-preview (1) 1.png" class="img-fluid"
                                style="max-width: 100%; max-height: 100%;" alt="الأدوية">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="width: 700px; background-color: #f8f9fa;">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-6 text-center text-md-end">
                        <h2 class="mb-3">الأطباء</h2>
                        <p class="mb-4 fw-bold"> عرض معلومات الأطباء وساعات عملهم </p>
                        <a href="#" class="btn btn-primary btn-lg px-4">دخول</a>
                    </div>
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 200px; height: 200px; background-color: #DEE9FF; overflow: hidden;">
                            <img src="img/دكتور_الاقسامremovebg-preview (1) 1.png" class="img-fluid"
                                style="max-width: 100%; max-height: 100%;" alt="الأدوية">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="width: 700px; background-color: #f8f9fa;">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-6 text-center text-md-end">
                        <h2 class="mb-3">المرضى</h2>
                        <p class="mb-4 fw-bold"> عرض ومتابعة بيانات المرضى الصحية </p>
                        <a href="#" class="btn btn-primary btn-lg px-4">دخول</a>
                    </div>
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="width: 200px; height: 200px; background-color: #DEE9FF; overflow: hidden;">
                            <img src="img/مريضة_الاقسامremovebg-preview (1) 1.png" class="img-fluid"
                                style="max-width: 100%; max-height: 100%;" alt="الأدوية">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection