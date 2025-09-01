@extends('Auth.app')
@section('title', 'اعادة تعيين كلمة المرور')

@section('form')
    <div class="login-right d-flex flex-column justify-content-center p-5">
        <div class="card shadow rounded-3 p-4 position-relative">

            <!-- زر الإغلاق -->
            <a href="{{route('home')}}" class="btn-close position-absolute top-0 end-0 m-3" aria-label="إغلاق"></a>

            <!-- اللوجو -->
            <div class="text-center mb-4">
                <div class="logo-wrapper mb-2 mx-auto">
                    <img src="{{asset('img/logo.png')}}" alt="MediTrack Logo" class="login-logo">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- الفورم -->
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <p class="text-center fw-bold text-primary">تغيير كلمة المرور</p>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="ادخل بريدك الإلكتروني" required>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="ادخل كلمة المرور الجديدة"
                            required>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="أعد إدخال كلمة المرور" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill mb-2">تغيير</button>
                <a href="{{route('login')}}" class="btn btn-primary w-100 rounded-pill">إلغاء</a>
            </form>



        </div>
    </div>
@endsection