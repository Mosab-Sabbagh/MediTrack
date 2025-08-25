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
            <form>
                <div class="mb-3">
                    {{-- <label class="form-label">اسم المستخدم</label> --}}
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="ادخل بريدك الإلكتروني">
                    </div>
                </div>

                <div class="mb-3">
                    {{-- <label class="form-label"> نوع الحساب</label> --}}
                    <select name="user_type" id="" class="form-control">
                        <option value="">اختار نوع الحساب</option>
                        <option value="doctor">طبيب</option>
                        <option value="pharmaceutical">صيدلي</option>
                        <option value="sick">مريض</option>
                    </select>
                </div>

                <div class="mb-2">
                    {{-- <label class="form-label">كلمة المرور</label> --}}
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="ادخل كلمة المرور الخاصة بك">
                    </div>
                </div>

                <div class="mb-2">
                    {{-- <label class="form-label">تأكيد كلمة المرور</label> --}}
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder=" تأكيد كلمة المرور   ">
                    </div>
                </div>

                <div class="mb-3 text-end">
                    <a href="{{route('login')}}" class="text-danger small">هل لديك حساب بالفعل؟</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill">إنشاء حساب</button>


            </form>
        </div>
    </div>
@endsection