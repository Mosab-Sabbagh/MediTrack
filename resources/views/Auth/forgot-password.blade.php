@extends('Auth.app')
@section('title', 'نسيت كلمة المرور')

@section('form')
    <div class="login-right d-flex flex-column justify-content-center p-5">
        <div class="card shadow rounded-3 p-4 position-relative">
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif
            <!-- زر الإغلاق -->
            <a href="{{route('login')}}" type="button" class="btn-close position-absolute top-0 end-0 m-3"
                aria-label="إغلاق"></a>

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
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <p class="text-center fw-bold text-primary">نسيت كلمة المرور</p>

                <div class="mb-3">
                    <label class="form-label">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور</label>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="ادخل بريدك الإلكتروني">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary w-100 rounded-pill mb-2">متابعة</button>
                <a href="{{route('login')}}" class="btn btn-primary w-100 rounded-pill">الغاء</a>
            </form>
        </div>
    </div>
@endsection