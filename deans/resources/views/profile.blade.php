@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Панель администратора</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Панель администратора</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('img/def_user.png')}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">
                                @for($it = 0; $it < sizeof($user->roles); $it++)
                                    {{$user->roles[$it]->role_name}}
                                    @if($it != sizeof($user->roles) - 1),@endif
                                @endfor
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Логин</b> <a class="float-right">{{$user->login}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Имя</b> <a class="float-right">{{$user->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Фамилия</b> <a class="float-right">{{$user->lastname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Отчество</b> <a class="float-right">{{$user->patronymic}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Пол</b> <a class="float-right">{{$user->gender->title_ru}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Телефон</b> <a class="float-right">{{$user->tel}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Дата рождения</b> <a class="float-right">{{$user->birthdate}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Адрес регистрации</b> <a
                                        class="float-right">{{$user->registration_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Адрес проживания</b> <a
                                        class="float-right">{{$user->residential_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ИИН</b> <a class="float-right">{{$user->iin}}</a>
                                </li>
                            </ul>

                            <a href="#" type="button" data-toggle="modal" data-target="#modal_edit"
                               class="btn btn-primary btn-block"><b>Редактировать</b></a>
                        </div>
                    </div>
                    @if($user->staff)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Информация работника</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Уровень английского</strong>

                                <p class="text-muted">
                                    {{$user->staff->english_level->description_ru}}
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Ученая степень</strong>
                                <p class="text-muted">{{$user->staff->academic_degree->title_ru}}</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Учёное звание</strong>
                                <p class="text-muted">
                                    {{$user->staff->academic_rank->title_ru}}
                                </p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Иностранец</strong>
                                @if($user->staff->is_foreign)
                                    <p class="text-muted">Да</p>
                                @else
                                    <p class="text-muted">Нет</p>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($user->student)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Информация о студенте</h3>
                            </div>
                            <div class="card-body">
                                <strong>Группа</strong>
                                <p class="text-muted">{{$user->student->group->title_ru}}</p>

                                <hr>

                                <strong>Статус студента</strong>
                                <p class="text-muted">{{$user->student->status->description_ru}}</p>

                                <hr>

                                <strong>Форма обучения</strong>
                                <p class="text-muted">{{$user->student->study_form->description_ru}}</p>

                                <hr>

                                <strong>Форма оплаты</strong>
                                <p class="text-muted">{{$user->student->payment_form->description_ru}}</p>

                                <hr>

                                <strong>Курс</strong>
                                <p class="text-muted">{{$user->student->course}}</p>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                                        data-toggle="tab">Запрошенные справки</a>
                                </li>
                                {{--                                    <li class="nav-item"><a class="nav-link" href="#send_order"--}}
                                {{--                                                            data-toggle="tab">Send order</a></li>--}}
                                <li class="nav-item"><a class="nav-link" href="#groups"
                                                        data-toggle="tab">Мои группы</a></li>


                                <li class="nav-item"><a class="nav-link" href="#add_student"
                                                        data-toggle="tab">Добавить студента</a></li>


                                @if (auth()->user()->isAdmin())
                                    {{--                                        <li class="nav-item"><a class="nav-link" href="#add_staff"--}}
                                    {{--                                                                data-toggle="tab">Add staff</a></li>--}}


                                    {{--                                        <li class="nav-item"><a class="nav-link" href="#add_order_type"--}}
                                    {{--                                                                data-toggle="tab">Add process type</a></li>--}}
                                    {{--                                        <li class="nav-item"><a class="nav-link" href="#dep"--}}
                                    {{--                                                                data-toggle="tab">Departments</a></li>--}}

                                    <li class="nav-item"><a class="nav-link" href="#panel"
                                                            data-toggle="tab">Редактировать</a></li>
                                @endif
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    @foreach($orders as $order)
                                        <div class="post">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="user-block">

                                                <span class="username ml-0">
                                                        <a href="#">{{$order->user->name}}</a>
                                                </span>
                                                        <span
                                                            class="description ml-0">{{$order->created_at}}</span>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <p>
                                                        {{$order->cat->description_ru}}
                                                    </p>
                                                </div>

                                                <div class="col-3">
                                                    <a href="#" class="btn btn-success">Load document</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="add_student">
                                    <form action="{{route('add_student')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex w-100">
                                                <div class="flex-grow-1">
                                                    <input type="text" class="form-control"
                                                           placeholder="Enter user login"
                                                           aria-label="Search" name="login" id="search_user">
                                                    <div class="search-res" id="st_user_res_container">
                                                        <ul class="list-group" id="st_user_res">
                                                        </ul>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#add_user">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100">
                                                <select name="group" id="" class="form-control">
                                                    @foreach(\App\Models\Groups::all() as $group)
                                                        <option
                                                            value="{{$group->id}}">{{$group->title_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#add_group">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100">
                                                <select name="study_form" id="" class="form-control">
                                                    @foreach(\App\Models\StudyForms::all() as $form)
                                                        <option
                                                            value="{{$form->id}}">{{$form->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#add_study_form">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100">
                                                <select name="study_lang" id="" class="form-control">
                                                    @foreach(\App\Models\StudyLangs::all() as $langs)
                                                        <option
                                                            value="{{$langs->id}}">{{$langs->title_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#study_lang">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100">
                                                <select name="payment_form" id="" class="form-control">
                                                    @foreach(\App\Models\PaymentForms::all() as $pay)
                                                        <option
                                                            value="{{$pay->id}}">{{$pay->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#payment_form">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100">
                                                <select name="study_status" id=""
                                                        class="form-control flex-grow-1">
                                                    @foreach(\App\Models\StudyStatuses::all() as $stat)
                                                        <option
                                                            value="{{$stat->id}}">{{$stat->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button"
                                                        class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                        data-toggle="modal" data-target="#study_statuses">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="course"
                                                   name="course">
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    add student
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="groups">
                                    <div class="row">
                                        @foreach($user->my_groups as $group)
                                            <div class="col-4">
                                                <div class="group_card">
                                                    <a class="h3 mb-2"
                                                       href="{{route('get_group', ['id'=>$group->id])}}">{{$group->title_kk}}</a>
                                                    <div class="d-flex">
                                                        <p class="mb-1"><b
                                                                class="mr-2">Department:</b> {{$group->departments->title_ru}}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex">
                                                        <p class="mb-1"><b class="mr-2">Students
                                                                amount:</b> {{$group->students->count()}}</p>
                                                    </div>

                                                    <div class="d-flex">
                                                        <p class="mb-1"><b
                                                                class="mr-2">Created:</b> {{$group->created_at}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if (auth()->user()->isAdmin())
                                    <div class="tab-pane" id="add_order_type">
                                        <form class="form-horizontal" action="{{route('add_order_type')}}"
                                              method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="description_kz" class="form-control"
                                                       placeholder="Enter description(kz)">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="description_ru" class="form-control"
                                                       placeholder="Enter description(ru)">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="description_en" class="form-control"
                                                       placeholder="Enter description(en)">
                                            </div>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="panel">
                                        <ul class="list-group">
                                            <a class="list-group-item list-group-item-action"
                                               href="{{route('panel-department')}}">Департаменты</a>
                                            <a class="list-group-item list-group-item-action"
                                               href="{{route('panel-group')}}">Группы</a>
                                            <a class="list-group-item list-group-item-action"
                                               href="{{route('panel-staff')}}">Данные о сотрудныке</a>
                                            <a class="list-group-item list-group-item-action"
                                               href="{{route('panel-order_type')}}">Справки</a>
                                        </ul>
                                    </div>

                                @endif

                                @if(auth()->user()->isAdmin())
                                    {{--                                        <div class="tab-pane" id="dep">--}}
                                    {{--                                            <div class="row">--}}
                                    {{--                                                @foreach($user->departments as $dep)--}}
                                    {{--                                                    <div class="col-4">--}}
                                    {{--                                                        <div class="group_card">--}}
                                    {{--                                                            <a class="h3 mb-2"--}}
                                    {{--                                                               href="">{{$dep->title_short_ru}}</a>--}}
                                    {{--                                                            <div class="d-flex">--}}
                                    {{--                                                                <p class="mb-1"><b--}}
                                    {{--                                                                        class="mr-2">Department:</b> {{$dep->title_ru}}--}}
                                    {{--                                                                </p>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                            <div class="d-flex">--}}
                                    {{--                                                                <p class="mb-1"><b class="mr-2">Department type:</b> {{$dep->type->description_ru}}</p>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                            <div class="d-flex">--}}
                                    {{--                                                                <p class="mb-1"><b class="mr-2">Staff--}}
                                    {{--                                                                        amount:</b> {{$dep->include_staff}}</p>--}}
                                    {{--                                                            </div>--}}

                                    {{--                                                            <div class="d-flex">--}}
                                    {{--                                                                <p class="mb-1"><b--}}
                                    {{--                                                                        class="mr-2">Created:</b> {{$group->created_at}}--}}
                                    {{--                                                                </p>--}}
                                    {{--                                                            </div>--}}
                                    {{--                                                        </div>--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                @endforeach--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>


    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="modal_edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('post_change_user')}}" method="post">
                            @csrf

                            <input type="number" class="form-control" name="id" hidden value="{{$user->id}}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name"
                                       value="{{$user->name}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Login" name="login"
                                       value="{{$user->login}}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Lastname"
                                       name="lastname" value="{{$user->lastname}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Patronymic"
                                       name="patronymic" value="{{$user->patronymic}}">
                            </div>
                            <div class="input-group mb-3">
                                <select name="gender" id="g" placeholder="Gender" class="form-control">
                                    @foreach(\App\Models\Gender::all() as $g)
                                        <option value="{{$g->id}}"
                                                @if($user->gender->id == $g->id)selected @endif>{{$g->title_ru}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone number"
                                       name="tel" value="{{$user->tel}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Birthdate"
                                       name="birthdate" value="{{date('Y-m-d', strtotime($user->birthdate))}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Registration Address"
                                       name="registration_address" value="{{$user->registration_address}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Residential Address"
                                       name="residential_address" value="{{$user->residential_address}}">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="IIN"
                                       name="iin" value="{{$user->iin}}">
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary btn-block w-100">Редактировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_study_form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add study form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_study_form')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="degree_id" class="form-control">
                                @foreach(\App\Models\DegreeTypes::all() as $degree)
                                    <option value="{{$degree->id}}">{{$degree->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="department_type_id" class="form-control">
                                @foreach(\App\Models\DepartmentTypes::all() as $dep)
                                    <option value="{{$dep->id}}">{{$dep->description_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (en)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (ru)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (kk)"
                                   name="description_kk">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="course" name="course_count">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="study_lang">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add study language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_study_lang')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Language (en)" name="title_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Language (ru)" name="title_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Language (kk)" name="title_kk">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="payment_form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add payment form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_payment_forms')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (en)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (ru)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (kk)"
                                   name="description_kk">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="study_statuses">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add study status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_study_status')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (en)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (ru)"
                                   name="description_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description (kk)"
                                   name="description_kk">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('add_user')}}" method="post">
                            @csrf
                            <input type="number" class="form-control" name="id" hidden value="{{$user->id}}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Login" name="login">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Lastname"
                                       name="lastname">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Patronymic"
                                       name="patronymic">
                            </div>
                            <div class="input-group mb-3">
                                <select name="gender" id="g" placeholder="Gender" class="form-control">
                                    @foreach(\App\Models\Gender::all() as $g)
                                        <option value="{{$g->id}}">{{$g->title_ru}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone number"
                                       name="tel">
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Birthdate"
                                       name="birthdate">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Registration Address"
                                       name="registration_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Residential Address"
                                       name="residential_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="IIN"
                                       name="iin">
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary btn-block w-100">Редактировать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
