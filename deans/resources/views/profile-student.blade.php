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
                <div class="col-md-4">
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
                </div>
                @if($user->student)
                    <div class="col-md-4">
                        <div class=" card card-primary">
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
                    </div>
                @endif
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
                                    class="mt-2 btn btn-primary btn-block w-100">@lang('messages.add')</button>
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
