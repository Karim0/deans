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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    {{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/balloon/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

    <script defer src="{{asset('js/awesome/all.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">@lang('messages.home')</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('contacts')}}" class="nav-link">@lang('messages.contact')</a>
            </li>
            <li>
                <form action="{{route('change-lang')}}" method="post" id="lang_form">
                    @csrf
                    <select name="lang" id="lang" onchange="langSend()" class="form-control">
                        <option value="ru" {{ App::isLocale('ru') ? 'selected': ''}}>Русский язык</option>
                        <option value="en" {{App::isLocale('en') ? 'selected': ''}}>English</option>
                        <option value="kz" {{App::isLocale('kz') ? 'selected': ''}}>Қазақ</option>
                    </select>
                </form>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4 h-100">
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('img/logo.png')}}"
                 alt="Logo"
                 class="brand-image img-circle elevation-3 mt-1"
                 style="opacity: .8; width: 34px; height: auto">
            <span class="brand-text font-weight-light">@lang('messages.deans')</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{!is_null(auth()->user()->profile_img) ? '/'.auth()->user()->profile_img : asset('/img/def_user.png')}}"
                         class="img-circle elevation-2 profile-user-img-menu-custom" alt="User Image">
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
                                <span class="brand-text font-weight-light">@lang('messages.edit')</span>
                            </a>
                            <div class="collapse" id="panel">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-user')}}">@lang('messages.users')</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-department')}}">@lang('messages.departments')</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-group')}}">@lang('messages.groups')</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-staff')}}">@lang('messages.staff_info')</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-student_info')}}">@lang('messages.student_info')</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-order_type')}}">@lang('messages.references')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-academic_degree')}}">@lang('messages.academic_degree')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white" href="{{route('panel-academic_rank')}}">@lang('messages.academic_rank')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white" href="{{route('panel-english_level')}}">@lang('messages.english_level')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white" href="{{route('panel-payment_form')}}">@lang('messages.payment_form')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white" href="{{route('panel-study_lang')}}">@lang('messages.study_lang')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white" href="{{route('panel-department_type')}}">@lang('messages.department_type')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-degree_type')}}">@lang('messages.degree_type')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-study_form')}}">@lang('messages.study_form')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-contact')}}">@lang('messages.contact')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="{{route('panel-news')}}">@lang('messages.news')</a>
                                    </li>

                                    <li class="list-group-item list-group-item-action list-group-item-dark">
                                        <a class="text-white"
                                           href="#drop_password_modal" type="button" data-toggle="modal">@lang('messages.drop_pass')</a>
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
                                <label for="login_reset" class="font-weight-normal">@lang('messages.student_login')</label>
                                <input type="search" id="login_reset" class="form-control" name="login">
                                <div class="search-res w-auto" id="st_user_res_container_login_reset">
                                    <ul class="list-group" id="st_user_res_login_reset">
                                    </ul>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-3">@lang('messages.drop_pass')</button>
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
<script src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/dataRender/datetime.js"></script>
{{--<link rel="icon" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">--}}
@yield('script')
<script>
    function langSend(){
        $('#lang_form').submit();
    }
</script>
</body>
</html>
