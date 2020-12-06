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
                                <a href="#upload_image_modal" type="button" data-toggle="modal"
                                   data-target="#upload_image_modal">
                                    <img class="profile-user-img img-fluid img-circle profile-user-img-custom"
                                         src="{{!is_null(auth()->user()->profile_img) ? auth()->user()->profile_img : asset('/img/def_user.png')}}"
                                         alt="User profile picture" style="">


                                </a>
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

                            <a href="#" type="button" data-toggle="modal" data-target="#reset_password_modal"
                               class="btn btn-primary btn-block"><b>Сбросить пароль</b></a>
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


                            </ul>
                        </div>
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
                                            <div class="d-flex w-100 align-items-center">
                                                <select name="group" id="" class="form-control">
                                                    @foreach(\App\Models\Groups::all() as $group)
                                                        <option
                                                            value="{{$group->id}}">{{$group->title_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <a href="{{route('panel-group')}}"
                                                   class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold">
                                                    +
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100 align-items-center">
                                                <select name="study_form" id="" class="form-control">
                                                    @foreach(\App\Models\StudyForms::all() as $form)
                                                        <option
                                                            value="{{$form->id}}">{{$form->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <a href="{{route('panel-study_form')}}"
                                                   class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold">
                                                    +
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100 align-items-center">
                                                <select name="study_lang" id="" class="form-control">
                                                    @foreach(\App\Models\StudyLangs::all() as $langs)
                                                        <option
                                                            value="{{$langs->id}}">{{$langs->title_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                   href="{{route('panel-study_lang')}}">
                                                    +
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100 align-items-center">
                                                <select name="payment_form" id="" class="form-control">
                                                    @foreach(\App\Models\PaymentForms::all() as $pay)
                                                        <option
                                                            value="{{$pay->id}}">{{$pay->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                                   href="{{route('panel-payment_form')}}">
                                                    +
                                                </a>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="d-flex w-100 align-items-center">
                                                <select name="study_status" id=""
                                                        class="form-control flex-grow-1">
                                                    @foreach(\App\Models\StudyStatuses::all() as $stat)
                                                        <option
                                                            value="{{$stat->id}}">{{$stat->description_ru}}</option>
                                                    @endforeach
                                                </select>
                                                <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold">
                                                    +
                                                </a>
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
                                                       href="{{route('get_group', ['id'=>$group->id])}}">{{$group->title_kz}}</a>
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
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="reset_password_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('reset_password')}}" method="post" id="reset_password_form">
                            @csrf
                            <div class="group-control">
                                <label for="password" class="font-weight-normal">Старый пароль</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                            <div class="group-control">
                                <label for="new_password" class="font-weight-normal">Новый пароль</label>
                                <input type="password" id="new_password" class="form-control" name="new_password"
                                       required>
                            </div>
                            <div class="group-control">
                                <label for="new_password2" class="font-weight-normal">Повторите пароль</label>
                                <input type="password" id="new_password2" class="form-control" name="new_password2"
                                       required>
                            </div>

                            <button class="btn btn-primary mt-3" id="btn_reset_pass">Сбросить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="upload_image_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('upload_image')}}" method="post" id="upload_image_form"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="d-flex justify-content-center">
                                <img id="img_output" class="img-fluid img-circle profile-user-img-modal "
                                     src="{{!is_null(auth()->user()->profile_img) ? auth()->user()->profile_img : asset('/img/def_user.png')}}"
                                     alt="img">
                            </div>
                            <div class="custom-file">
                                <input type="file" id="image"  class="custom-file-input" name="image" onchange="loadFile(event)" required>
                                <label for="image" class="custom-file-label">Выберите фотку</label>
                            </div>

                            <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>

                            <button class="btn btn-primary mt-3" id="upload_image">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('img_output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endsection
