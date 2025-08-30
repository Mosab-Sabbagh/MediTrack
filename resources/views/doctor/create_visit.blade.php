@extends('pages.layouts.app')
@section('title', 'إضافة زيارة ')

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="#">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="{{route('doctor.index')}}"> معلومات الطبيب </a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> اضافة وصفة </a>
        </div>
    </div>



    <section class="container py-5">
        <div class="container my-5 " dir="rtl">
            <div class="card shadow p-4 mx-auto position-relative" style="max-width: 600px;">
                <a href="{{route('doctor.index')}}" class="btn-close position-absolute top-0 end-0 m-3"
                    aria-label="إغلاق"></a>
                <h2 class="text-center mb-4 fw-bold">إضافة زيارة</h2>

                <form action="{{ route('doctor.visit.store', $patient->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label>تاريخ الزيارة</label>
                        <input type="date" name="visit_date" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>الملاحظات/التشخيص</label>
                        <textarea name="notes" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة زيارة</button>
                </form>

            </div>

        </div>
    </section>

@endsection