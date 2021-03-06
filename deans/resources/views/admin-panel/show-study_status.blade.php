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
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">@lang('messages.admin_panel')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.study_statuses')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_study_statuses">Добавить
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.description_kz')</th>
                <th scope="col">@lang('messages.description_ru')</th>
                <th scope="col">@lang('messages.description_en')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($study_statuses as $stat)
                <tr>
                    <th>{{$stat->id}}</th>
                    <td>{{$stat->description_kz}}</td>
                    <td>{{$stat->description_ru}}</td>
                    <td>{{$stat->description_en}}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                           href="{{route('edit-study_status_page', ['id'=>$stat->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete-study_status', ['id'=>$stat->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_study_statuses">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-study_status')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="description_ru" class="font-weight-normal">@lang('messages.description_ru')</label>
                            <input type="text" class="form-control" id="description_ru" name="description_ru">
                        </div>

                        <div class="form-group">
                            <label for="description_en" class="font-weight-normal">@lang('messages.description_en')</label>
                            <input type="text" class="form-control" id="description_en" name="description_en">
                        </div>
                        <div class="form-group">
                            <label for="description_kz" class="font-weight-normal">@lang('messages.description_kz')</label>
                            <input type="text" class="form-control" id="description_kz" name="description_kz">
                        </div>


                        <button type="submit" class="btn btn-primary">@lang('messages.add')</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
