@extends('pages.layouts.app')
@section('title', 'تواصل معنا')

@section('content')
    <section class=" py-5">
        <div class="text-center">
            <img src="img/contact_us.png" alt="" class="img-fluid">
        </div>

        <div class="align-items-center">
            <p class="text-center mt-5 fw-bold">نرحب باستفساراتكم، ملاحظاتكم، أو أي مشاكل تواجهكم أثناء استخدام النظام.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container my-5" dir="rtl">
            <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
                <h2 class="text-center mb-4 fw-bold">نموذج التواصل</h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">الاسم:</label>
                        <input type="text" class="form-control input-form" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">البريد الإلكتروني:</label>
                        <input type="email" class="form-control input-form" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">رقم الهاتف (اختياري):</label>
                        <input type="tel" class="form-control input-form" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold">الموضوع:</label>
                        <input type="text" class="form-control input-form" id="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">الرسالة:</label>
                        <textarea class="form-control input-form" id="message" rows="5"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">أرسل الرسالة</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container my-5 text-end">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <hr class="mb-4">
                    <h2 class="text-center mb-4">بيانات الاتصال المباشر</h2>
                    <ul class="">
                        <li class="mb-2">
                            <p>
                                <strong>البريد الإلكتروني:</strong> support@meditrack.ps
                            </p>
                        </li>
                        <li class="mb-2">
                            <p>
                                <strong>رقم الواتساب:</strong> 0590003124
                            </p>
                        </li>
                        <li class="mb-2">
                            <p>
                                <strong>ساعات العمل:</strong> يوميًا من 9 صباحًا حتى 4 مساءً (عدا الجمعة)
                            </p>
                        </li>
                    </ul>
                    <hr class="mt-4">
                </div>
            </div>
        </div>
    </section>
@endsection