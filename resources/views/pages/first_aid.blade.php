@extends('pages.layouts.app')
@section('title', 'الاسعافات الأولية')د

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="#">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#">الاسعافات الاولية </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title">الاسعافات الاولية</h1>
    </div>

    <section class="hero py-5">
        <div class="text-center">
            <img src="img/main-aid.png" alt="" class="img-fluid">
        </div>

        <div>
            <p class="text-center mt-5 fs-5">
                الإسعافات الأولية هي الرعاية الفورية التي تقدم عند حدوث إصابة أو طارئ صحي قبل وصول المساعدة الطبية.
            </p>
        </div>
    </section>

    <section class="common-cases py-5">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">الحالات الشائعة وطريقة التعامل معها</h2>
                </div>
            </div>

            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">النزيف</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>اضغط على مكان النزيف بقطعة قماش نظيفة</li>
                                    <li>ارفع الجزء المصاب إن أمكن</li>
                                    <li>لا تلمس الجرح بيدك مباشرة</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid1.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">الحروق</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>برّد مكان الحرق بالماء الجاري لمدة 10 دقائق</li>
                                    <li> لا تستخدم الثلج أو معجون الأسنان </li>
                                    <li> غطِ الحرق بشاش معقم </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid2.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">الكسور</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>لا تحرك الجزء المصاب </li>
                                    <li>ثبّت الطرف إن أمكن</li>
                                    <li>اطلب المساعدة الطبية فورًا </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid3.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">فقدان الوعي</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>افحص التنفس </li>
                                    <li>إذا لم يتنفس، ابدأ بالإنعاش القلبي (CPR)</li>
                                    <li>إذا كان يتنفس، ضعه في وضع الإفاقة وانتظر الإسعاف</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid4.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>


            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">التسمم</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>لا تجبر المصاب على التقيؤ</li>
                                    <li>حدد نوع المادة إذا أمكن</li>
                                    <li>تواصل مع الطوارئ فورًا</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid5.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <div class="card-body text-end">
                                <h3 class="card-title fw-bold mb-3 text-center ">الاختناق</h3>
                                <ul class="fw-bold fs-5" style="padding-right: 100px;">
                                    <li>شجع المصاب على السعال</li>
                                    <li>إذا لم ينجح، استخدم ضغطة البطن (مناورة هيملتش)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="img/first_aid6.png" class="img-fluid rounded-start" alt="نزيف">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection