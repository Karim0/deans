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
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.users')</li>
                    </ol>
                </nav>
            </div>
        </div>

        <button type="button"
                class="btn btn-primary mb-2 mt-2"
                data-toggle="modal" data-target="#add_user">
            @lang('messages.add')
        </button>
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">@lang('messages.login')</th>
                <th scope="col">@lang('messages.name')</th>
                <th scope="col">@lang('messages.lastname')</th>
                <th scope="col">@lang('messages.patronymic')</th>
                <th scope="col">@lang('messages.gender')</th>
                <th scope="col">@lang('messages.birthday')</th>
                <th scope="col">@lang('messages.address_reg')</th>
                <th scope="col">@lang('messages.address_res')</th>
                <th scope="col">@lang('messages.iin')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('add_user')}}" method="post">
                            @csrf
                            <input type="number" class="form-control" name="id" hidden value="{{auth()->user()->id}}">
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
                            <button type="submit" class="mt-2 btn btn-primary btn-block w-100">@lang('messages.edit')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                // "pagingType": "scrolling",
                // "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{route('user-list')}}",
                    // "dataType": "jsonp"
                },
                "columns": [
                    {
                        "data": "id"
                    },
                    {
                        "data": "login"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "lastname"
                    },
                    {
                        "data": "patronymic"
                    },
                    {
                        "data": "gender",
                        "render": function (data, type) {
                            return data['title_{{App::getLocale()}}'];
                        }
                    },
                    {
                        "data": "birthdate"
                    },
                    {
                        "data": "registration_address"
                    },
                    {
                        "data": "residential_address"
                    },
                    {
                        "data": "iin"
                    },
                    {
                        "data": "id",
                        "render": function (data, type) {
                            return "<a class=\"btn btn-primary mb-1\" href=\"/panel-user/edit/" + data + "\"><i class=\"fa fa-edit\"></i></a> " +
                                "<a class=\"btn btn-danger\" href=\"/panel-user/delete/" + data + "\"><i class=\"fa fa-window-close\"></i></a>";
{{--                            {{route('edit-department_page', ['id'=>" data "])}}--}}
{{--                            {{route('delete-department', ['id'=>$dep->id])}}--}}
                        }
                    }
                ]
            });
        });
    </script>
@endsection
