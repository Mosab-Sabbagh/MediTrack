@extends('Auth.app')
@section('title', 'تسجيل الدخول')

@section('form')
    <div class="login-right d-flex flex-column justify-content-center p-5">
        <div class="card shadow rounded-3 p-4 position-relative">

            <!-- زر الإغلاق -->
            <a href="{{route('home')}}" class="btn-close position-absolute top-0 end-0 m-3" aria-label="إغلاق"></a>

            <!-- اللوجو -->
            <div class="text-center mb-4">
                <div class="logo-wrapper mb-2 mx-auto">
                    <img src="img/logo.png" alt="MediTrack Logo" class="login-logo">
                </div>
            </div>

            <!-- الفورم -->
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">اسم المستخدم</label>
                    <div class="input-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="ادخل بريدك الإلكتروني">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">كلمة المرور</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control"
                            placeholder="ادخل كلمة المرور الخاصة بك">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-end">
                    <a href="reset.html" class="text-danger small">هل نسيت كلمة المرور؟</a>
                </div>

                {{-- لو في خطأ عام (مثلاً بيانات الدخول غلط) --}}
                @if($errors->has('email'))
                    <div class="alert alert-danger small">{{ $errors->first('email') }}</div>
                @endif

                <button type="submit" class="btn btn-primary w-100 rounded-pill">تسجيل</button>
            </form>

        </div>
    </div>
@endsection