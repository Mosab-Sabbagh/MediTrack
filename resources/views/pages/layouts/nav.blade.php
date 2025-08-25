<nav class="navbar navbar-expand-lg bg-transparent pt-3 ">
    <div class="container">
        <div class="logo-responce">
            <a class="navbar-brand" href="{{route('home')}}"><img src="img/logo.png" alt="MediTrack"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav m-auto">
                <li class="nav-item ms-3 "><a class="nav-link active" style="color: #1364FF;"
                        href="{{route('home')}}">الصفحة الرئيسية</a></li>
                <li class="nav-item ms-3 "><a class="nav-link" style="color: #1364FF;" href="{{route('about')}}">عن
                        الموقع</a></li>
                <li class="nav-item ms-3 "><a class="nav-link" style="color: #1364FF;"
                        href="{{route('sections')}}">الأقسام</a></li>
                <li class="nav-item ms-3 "><a class="nav-link" style="color: #1364FF;"
                        href="{{route('connect_us')}}">تواصل معنا</a></li>
            </ul>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn dropdown-toggle style_btn" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        تسجيل الدخول
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">تسجيل الدخول</a></li>
                        <li><a class="dropdown-item" href="#">إنشاء حساب</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>