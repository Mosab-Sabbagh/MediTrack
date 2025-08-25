<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

    <div class="login-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-card d-flex flex-md-row flex-column">

            @yield('form')

        <div class="login-left position-relative">
            <img src="{{asset('img/Rectangle-login.png')}}" class="rectangle-login img-fluid" alt="Background">
            <img src="{{asset('img/Ellipse-login.png')}}" class="ellipse-login img-fluid" alt="Ellipse">
            <img src="{{asset('img/medicine-login.png')}}" class="medicine-login img-fluid" alt="Medicine">
        </div>

        </div>
    </div>
</body>

</html>