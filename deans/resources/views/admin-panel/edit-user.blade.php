@extends('common_admin')
@section('title')
    Панель администратора
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">@lang('messages.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">@lang('messages.admin_panel')</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('panel-user')}}">@lang('messages.users')</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{$user->login}}</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <form action="" method="post">
                    @csrf
                    {{--                    <input type="number" class="form-control" name="id" hidden value="{{auth()->user()->id}}">--}}
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
                        <select name="gender_id" id="g" placeholder="Gender" class="form-control">
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
                    <button type="submit" class="mt-2 btn btn-primary btn-block w-100">@lang('messages.edit')</button>
                </form>
            </div>
        </div>


        <button type="button"
                class="btn btn-primary mt-4"
                data-toggle="modal" data-target="#add_user_role">
            @lang('messages.add')
        </button>

        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.role')</th>
                <th scope="col">@lang('messages.description')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->roles as $role)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->role_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('panel-delete_user_role', ['role_id'=>$role->id, 'user_id'=>$user->id])}}"><i class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_user_role">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('panel-add_user_role')}}" method="post">
                            @csrf
                            <input type="number" class="form-control" name="user_id" hidden value="{{$user->id}}">
                            <div class="input-group mb-3">
                                <select name="role_id" id="g" placeholder="Role" class="form-control">
                                    @foreach(\App\Models\Role::all() as $r)
                                        <option value="{{$r->id}}">{{$r->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                    class="mt-2 btn btn-primary btn-block w-100">@lang('messages.add')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
