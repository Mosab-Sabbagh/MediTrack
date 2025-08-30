@extends('pages.layouts.app')
@section('title', 'إضافة وصفة ')

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
                <h2 class="text-center mb-4 fw-bold">إضافة وصفة</h2>
                <form action="{{ route('doctor.prescribe', $patient->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>اختر الدواء</label>
                        <select name="medicine_id" class="form-control">
                            @foreach($medicines as $medicine)
                                <option value="{{ $medicine->id }}">{{ $medicine->name }} - {{ $medicine->quantity }} حبة
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>التشخيص</label>
                        <textarea name="diagnosis" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>ملاحظات</label>
                        <textarea name="notes" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">إضافة وصفة</button>
                </form>

            </div>

        </div>
    </section>

@endsection