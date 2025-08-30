@extends('pages.layouts.app')
@section('title', 'إضافة مريض جديد')

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
            <a href="#"> اضافة مريض </a>
        </div>
    </div>



    <section class="container py-5">
        <div class="container my-5 " dir="rtl">
            <div class="card shadow p-4 mx-auto position-relative" style="max-width: 600px;">
                <a href="{{route('doctor.index')}}" class="btn-close position-absolute top-0 end-0 m-3"
                    aria-label="إغلاق"></a>
                <h2 class="text-center mb-4 fw-bold">إضافة مريض</h2>

                <form action="{{ route('doctor.patients.store') }}" method="POST">
                    @csrf
                    {{-- الاسم الكامل (user.name) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">الاسم الكامل:</label>
                        <input type="text" name="name" class="form-control input-form @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- البريد (user.email) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">البريد الإلكتروني:</label>
                        <input type="email" name="email"
                            class="form-control input-form @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- كلمة المرور (مبدئياً) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">كلمة المرور:</label>
                        <input type="password" name="password"
                            class="form-control input-form @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- تاريخ الميلاد --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">تاريخ الميلاد:</label>
                        <input type="date" name="date_of_birth"
                            class="form-control input-form @error('date_of_birth') is-invalid @enderror"
                            value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- الجنس --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">الجنس:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label">ذكر</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label">أنثى</label>
                            </div>
                            @error('gender')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- رقم الهوية --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">رقم الهوية:</label>
                        <input type="text" name="id_number"
                            class="form-control input-form @error('id_number') is-invalid @enderror"
                            value="{{ old('id_number') }}">
                        @error('id_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- رقم الهاتف --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">رقم الهاتف:</label>
                        <input type="tel" name="phone" class="form-control input-form @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- ملاحظات أو تشخيص أولي --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">التشخيص الأولي:</label>
                        <textarea name="notes" class="form-control input-form @error('notes') is-invalid @enderror"
                            rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection