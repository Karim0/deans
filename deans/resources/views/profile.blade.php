@extends('common_admin')
@section('title')
    @lang('messages.admin_panel')
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('messages.admin_panel')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">@lang('messages.home')</a></li>
                        <li class="breadcrumb-item active">@lang('messages.admin_panel')</li>
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
                                    <b>@lang('messages.login')</b> <a class="float-right">{{$user->login}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.name')</b> <a class="float-right">{{$user->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.lastname')</b> <a class="float-right">{{$user->lastname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.patronymic')</b> <a class="float-right">{{$user->patronymic}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.gender')</b> <a
                                        class="float-right">{{$user->gender['title_'.App::getLocale()]}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.phone')</b> <a class="float-right">{{$user->tel}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.birthday')</b> <a class="float-right">{{$user->birthdate}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.address_reg')</b> <a
                                        class="float-right">{{$user->registration_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.address_res')</b> <a
                                        class="float-right">{{$user->residential_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>@lang('messages.iin')</b> <a class="float-right">{{$user->iin}}</a>
                                </li>
                            </ul>

                            <a href="#" type="button" data-toggle="modal" data-target="#modal_edit"
                               class="btn btn-primary btn-block"><b>@lang('messages.edit')</b></a>

                            <a href="#" type="button" data-toggle="modal" data-target="#reset_password_modal"
                               class="btn btn-primary btn-block"><b>@lang('messages.reset_pass')</b></a>
                        </div>
                    </div>
                    @if($user->staff)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('messages.staff_info')</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> @lang('messages.english_level')</strong>

                                <p class="text-muted">
                                    {{$user->staff->english_level['description_'.App::getLocale()]}}
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> @lang('messages.academic_degree')
                                </strong>
                                <p class="text-muted">{{$user->staff->academic_degree['title_'.App::getLocale()]}}</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> @lang('messages.academic_rank')</strong>
                                <p class="text-muted">
                                    {{$user->staff->academic_rank['title_'.App::getLocale()]}}
                                </p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> @lang('messages.foreign')</strong>
                                @if($user->staff->is_foreign)
                                    <p class="text-muted">@lang('messages.yes')</p>
                                @else
                                    <p class="text-muted">@lang('messages.no')</p>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($user->student)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('messages.student_info')</h3>
                            </div>
                            <div class="card-body">
                                <strong>@lang('messages.group')</strong>
                                <p class="text-muted">{{$user->student->group['title_'.App::getLocale()]}}</p>

                                <hr>

                                <strong>@lang('messages.student_status')</strong>
                                <p class="text-muted">{{$user->student->status['description_'.App::getLocale()]}}</p>

                                <hr>

                                <strong>@lang('messages.study_form')</strong>
                                <p class="text-muted">{{$user->student->study_form['description_'.App::getLocale()]}}</p>

                                <hr>

                                <strong>@lang('messages.payment_form')</strong>
                                <p class="text-muted">{{$user->student->payment_form['description_'.App::getLocale()]}}</p>

                                <hr>

                                <strong>@lang('messages.course')</strong>
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
                                                        data-toggle="tab">@lang('messages.req_ref')</a>
                                </li>
                                {{--                                    <li class="nav-item"><a class="nav-link" href="#send_order"--}}
                                {{--                                                            data-toggle="tab">Send order</a></li>--}}
                                <li class="nav-item"><a class="nav-link" href="#groups"
                                                        data-toggle="tab">@lang('messages.my_group')</a></li>

                                <li class="nav-item"><a class="nav-link" href="#department"
                                                        data-toggle="tab">@lang('messages.departments')</a></li>


                                <li class="nav-item"><a class="nav-link" href="#add_student"
                                                        data-toggle="tab">@lang('messages.add_student')</a></li>


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
                                                        {{$order->cat['description_'.App::getLocale()]}}
                                                    </p>
                                                </div>

                                                <div class="col-3">
                                                    <button class="btn btn-success" type="button"
                                                            onclick="showUploadFileModal({{$order->id}})">@lang('messages.load_doc')
                                                    </button>
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
                                                            value="{{$group->id}}">{{$group['title_'.App::getLocale()]}}</option>
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
                                                            value="{{$form->id}}">{{$form['description_'.App::getLocale()]}}</option>
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
                                                            value="{{$langs->id}}">{{$langs['title_'.App::getLocale()]}}</option>
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
                                                            value="{{$pay->id}}">{{$pay['description_'.App::getLocale()]}}</option>
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
                                                            value="{{$stat->id}}">{{$stat['description_'.App::getLocale()]}}</option>
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
                                                    @lang('messages.add')
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
                                                       href="{{route('get_group', ['id'=>$group->id])}}">{{$group['title_'.App::getLocale()]}}</a>
                                                    <div class="d-flex">
                                                        <p class="mb-1"><b
                                                                class="mr-2">@lang('messages.department')
                                                                :</b> {{$group->departments['title_'.App::getLocale()]}}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex">
                                                        <p class="mb-1"><b
                                                                class="mr-2">@lang('messages.students_amount')
                                                                :</b> {{$group->students->count()}}</p>
                                                    </div>

                                                    <div class="d-flex">
                                                        <p class="mb-1"><b
                                                                class="mr-2">@lang('messages.created')
                                                                :</b> {{$group->created_at}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="department">
                                    @foreach($user->departments as $dep)
                                        @if($loop->index > 0) <br> @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>{{$dep['title_'.App::getLocale()]}} {{$dep['title_short_'.App::getLocale()]}}</h5>
                                            </div>
                                            @foreach($dep->groups as $group)
                                                <div class="col-4">
                                                    <div class="group_card p-3 border">
                                                        <a class="h3 mb-2"
                                                           href="{{route('get_group', ['id'=>$group->id])}}">{{$group['title_'.App::getLocale()]}}</a>
                                                        <div class="d-flex">
                                                            <p class="mb-1"><b
                                                                    class="mr-2">@lang('messages.department')
                                                                    :</b> {{$group->departments['title_'.App::getLocale()]}}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex">
                                                            <p class="mb-1"><b
                                                                    class="mr-2">@lang('messages.students_amount')
                                                                    :</b> {{$group->students->count()}}</p>
                                                        </div>

                                                        <div class="d-flex">
                                                            <p class="mb-1"><b
                                                                    class="mr-2">@lang('messages.created')
                                                                    :</b> {{$group->created_at}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
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
                                            <button type="submit" class="btn btn-success">@lang('messages.add')</button>
                                        </form>
                                    </div>
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
                                                @if($user->gender->id == $g->id)selected @endif>{{$g['title_'.App::getLocale()]}}</option>
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
                            <button type="submit"
                                    class="mt-2 btn btn-primary btn-block w-100">@lang('messages.edit')</button>
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
                                        <option value="{{$g->id}}">{{$g['title_'.App::getLocale()]}}</option>
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
                            <button type="submit"
                                    class="mt-2 btn btn-primary btn-block w-100">@lang('messages.edit')</button>
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
                                <label for="password" class="font-weight-normal">@lang('messages.old_pass')</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                            <div class="group-control">
                                <label for="new_password" class="font-weight-normal">@lang('messages.new_pass')</label>
                                <input type="password" id="new_password" class="form-control" name="new_password"
                                       required>
                            </div>
                            <div class="group-control">
                                <label for="new_password2"
                                       class="font-weight-normal">@lang('messages.repeat_pass')</label>
                                <input type="password" id="new_password2" class="form-control" name="new_password2"
                                       required>
                            </div>

                            <button class="btn btn-primary mt-3"
                                    id="btn_reset_pass">@lang('messages.reset_pass')</button>
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
                                <input type="file" id="image" class="custom-file-input" name="image"
                                       onchange="loadFile(event)" required>
                                <label for="image" class="custom-file-label">@lang('messages.choose_image')</label>
                            </div>

                            <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>

                            <button class="btn btn-primary mt-3" id="upload_image">@lang('messages.change')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="upload_file_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('upload_file')}}" method="post" id="upload_file_form"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="file" required>
                                <label for="file" class="custom-file-label">@lang('messages.choose_file')</label>
                            </div>

                            <input type="number" name="order_id" id="modal_order_id" hidden>

                            <button class="btn btn-primary mt-3" id="upload_file">@lang('messages.load')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        var loadFile = function (event) {
            var image = document.getElementById('img_output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function showUploadFileModal(order_id) {
            $('#modal_order_id').val(order_id);
            $('#upload_file_modal').modal('show');
        }
    </script>
@endsection
