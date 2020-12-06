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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
                        <a href="{{route('news')}}" class="nav-link">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contacts')}}" class="nav-link">Контакты</a>
                    </li>

                </ul>
            </div>


            <div class="dropdown order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                @if(auth()->check())
                    <a class="user-login" type="button" id="dropdownMenuButton"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img
                            src="{{!is_null(auth()->user()->profile_img) ? auth()->user()->profile_img : asset('/img/def_user.png')}}"
                            class="profile-user-img-menu-custom"
                            alt="">
                        <p>{{auth()->user()->lastname}} {{auth()->user()->name}}</p>
                    </a>
                @else
                    <button class="btn " type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Войти
                    </button>
                @endif
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if(auth()->check())
                        @if(auth()->user()->isAdvisor() or auth()->user()->isAdmin())
                            <a class="text-black-50 dropdown-item" href="{{route('profile')}}">Панель администратора</a>
                        @endif

                        <a class="text-black-50 dropdown-item" href="{{route('logout')}}">Выйти</a>
                    @else
                        <div class="dropdown-item">
                            <a class="text-black-50" href="{{route('login')}}">Авторизоваться</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="text-black-50" href="{{route('register')}}">Зарегистрироваться</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
</body>
</html>
