@extends('Auth.app')
@section('title', 'إنشاء حساب')

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
            <form action="{{route('register')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="ادخل اسم المستخدم"
                            value="{{ old('name') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="ادخل بريدك الإلكتروني"
                            value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <select name="user_type" id="" class="form-control">
                        <option value="">اختار نوع الحساب</option>
                        <option value="doctor" {{ old('user_type') == 'doctor' ? 'selected' : '' }}>طبيب</option>
                        <option value="pharmaceutical" {{ old('user_type') == 'pharmaceutical' ? 'selected' : '' }}>صيدلي
                        </option>
                        {{-- <option value="sick" {{ old('user_type') == 'sick' ? 'selected' : '' }}>مريض</option> --}}
                    </select>
                </div>

                <div class="mb-2">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control"
                            placeholder="ادخل كلمة المرور الخاصة بك">
                    </div>
                </div>

                <div class="mb-2">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder=" تأكيد كلمة المرور  ">
                    </div>
                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 text-end">
                    <a href="{{route('login')}}" class="text-danger small">هل لديك حساب بالفعل؟</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill">إنشاء حساب</button>
            </form>
        </div>
    </div>
@endsection