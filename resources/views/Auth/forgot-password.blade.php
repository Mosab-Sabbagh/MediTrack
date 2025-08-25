@extends('Auth.app')
@section('title', 'نسيت كلمة المرور')

@section('form')
    <div class="login-right d-flex flex-column justify-content-center p-5">
        <div class="card shadow rounded-3 p-4 position-relative">

            <!-- زر الإغلاق -->
            <a href="{{route('login')}}" type="button" class="btn-close position-absolute top-0 end-0 m-3"
                aria-label="إغلاق"></a>

            <!-- اللوجو -->
            <div class="text-center mb-4">
                <div class="logo-wrapper mb-2 mx-auto">
                    <img src="img/logo.png" alt="MediTrack Logo" class="login-logo">
                </div>
            </div>

            <!-- الفورم -->
            <form>
                <p class="text-center fw-bold text-primary">نسيت كلمة المرور</p>

                <div class="mb-3">
                    <label class="form-label">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور</label>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="ادخل بريدك الإلكتروني">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary w-100 rounded-pill mb-2">متابعة</button>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">الغاء</button>
            </form>
        </div>
    </div>
@endsection