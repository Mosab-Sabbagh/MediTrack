@extends('pages.layouts.app')
@section('title', 'تعديل الملف الشخصي للطبيب')
@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="{{route('home')}}">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="{{route('doctor.index')}}"> معلومات الطبيب </a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#">اكمال الملف الشخصي</a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title"> اكمال الملف الشخصي</h1>
    </div>
    <section class="py-5">
        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="max-width: 900px; background-color: #f8f9fa;">
                <form action="{{ route('doctor.update', Auth::user()->id) }}" method="POST" dir="rtl">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 text-end">
                        <label for="specialization" class="form-label fw-bold">التخصص</label>
                        <input type="text" class="form-control" id="specialization" name="specialization"
                            value="{{ old('specialization', Auth::user()->doctor?->specialization) }}" required>
                        @error('specialization')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <label for="license_number" class="form-label fw-bold">رقم الترخيص</label>
                        <input type="text" class="form-control" id="license_number" name="license_number"
                            value="{{ old('license_number', Auth::user()->doctor?->license_number) }}" required>
                        @error('license_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <label for="phone" class="form-label fw-bold">رقم الهاتف</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', Auth::user()->doctor?->phone) }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <label for="working_hours" class="form-label fw-bold">ساعات العمل</label>
                        <input type="text" class="form-control" id="working_hours" name="working_hours"
                            value="{{ old('working_hours', Auth::user()->doctor?->working_hours) }}" required>      
                        @error('working_hours')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <label for="section" class="form-label fw-bold">القسم</label>
                        <input type="text" class="form-control" id="section" name="section"
                            value="{{ old('section', Auth::user()->doctor?->section) }}" required>
                        @error('section')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">تحديث الملف
                            الشخصي</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
@endsection