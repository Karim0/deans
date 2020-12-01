<!DOCTYPE html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/awesome/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" href="{{asset('img/logo_icon.png')}}">

    <script defer src="{{asset('js/awesome/all.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Главная</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Контакты</a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4 h-100">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('img/logo.png')}}"
                 alt="Logo"
                 class="brand-image img-circle elevation-3 mt-1"
                 style="opacity: .8; width: 34px; height: auto">
            <span class="brand-text font-weight-light">Деканат</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('img/def_user.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->lastname}} {{auth()->user()->name}}</a>
                </div>

            </div>
            @if (auth()->user()->isAdmin())
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a class="nav-link" href="#panel" data-toggle="collapse"
                               aria-expanded="false" aria-controls="panel">
                                <i class="nav-icon ion ion-wrench"></i>
                                <span class="brand-text font-weight-light">Редактировать</span>
                            </a>
                            <div class="collapse" id="panel">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-department')}}">Департаменты</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-group')}}">Группы</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-staff')}}">Данные о сотрудныке</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-order_type')}}">Справки</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="#drop_password_modal" type="button" data-toggle="modal">Сбросить
                                            пароль</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>

            @endif
            <nav class="mt-2">
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="drop_password_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('drop_password')}}" method="post">
                            @csrf
                            <div class="group-control">
                                <label for="login_reset" class="font-weight-normal">Логин юзера</label>
                                <input type="search" id="login_reset" class="form-control" name="login">
                                <div class="search-res w-auto" id="st_user_res_container_login_reset">
                                    <ul class="list-group" id="st_user_res_login_reset">
                                    </ul>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-3">Сбросить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
