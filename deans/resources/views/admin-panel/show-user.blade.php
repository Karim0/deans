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
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.study_lang')</li>
                    </ol>
                </nav>
            </div>
        </div>


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
                            return "<a class=\"btn btn-primary mb-1\" href=\"#\"><i class=\"fa fa-edit\"></i></a> " +
                                "<a class=\"btn btn-danger\" href=\"#\"><i class=\"fa fa-window-close\"></i></a>";
{{--                            {{route('edit-department_page', ['id'=>" data "])}}--}}
{{--                            {{route('delete-department', ['id'=>$dep->id])}}--}}
                        }
                    }
                ]
            });
        });
    </script>
@endsection
