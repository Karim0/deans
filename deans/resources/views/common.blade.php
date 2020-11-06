<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('img/logo_icon.png')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/awesome/all.css')}}">
    <script defer src="{{asset('js/awesome/all.js')}}"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="{{route('home')}}" class="navbar-brand">
                <img src="{{asset('img/logo.png')}}" alt="Logo"
                     class="brand-image"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Деканат</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Контакты</a>
                    </li>

                </ul>
            </div>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
</div>


<aside class="control-sidebar control-sidebar-dark" style="bottom: 0">
    <div class="p-3">
        <div class="border-bottom pb-2">

            @if(auth()->user())
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{route('logout')}}">Выйти</a>
                </div>
            @else
                <div>
                    <a href="{{route('login')}}">Авторизоваться</a>
                </div>
                <div>
                    <a href="{{route('register')}}">Зарегистрироваться</a>
                </div>
            @endif
        </div>
        @if(auth()->check())
            @if(auth()->user()->isAdvisor() or auth()->user()->isAdmin())
                <div class="pt-2 pb-2">
                    <a href="{{route('profile')}}">Панель администратора</a>
                </div>
            @endif
        @endif
    </div>

</aside>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
</body>
</html>
