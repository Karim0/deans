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
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.academic_rank')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_academic_ranks">Добавить
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Порядок сортировки</th>
                <th scope="col">Название на русском</th>
                <th scope="col">Название на английском</th>
                <th scope="col">Название на казахском</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($academic_ranks as $rank)
                <tr>
                    <th>{{$rank->id}}</th>
                    <td>{{$rank->sort_order}}</td>
                    <td>{{$rank->title_kz}}</td>
                    <td>{{$rank->title_ru}}</td>
                    <td>{{$rank->title_en}}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                           href="{{route('edit-academic_rank_page', ['id'=>$rank->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete-academic_rank', ['id'=>$rank->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_academic_ranks">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-academic_rank')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title_ru" class="font-weight-normal">Название на русском</label>
                            <input type="text" class="form-control" id="title_ru" name="title_ru">
                        </div>
                        <div class="form-group">
                            <label for="title_en" class="font-weight-normal">Название на английском</label>
                            <input type="text" class="form-control" id="title_en" name="title_en">
                        </div>
                        <div class="form-group">
                            <label for="title_kz" class="font-weight-normal">Название на казахском</label>
                            <input type="text" class="form-control" id="title_kz" name="title_kz">
                        </div>

                        <div class="form-group">
                            <label for="sort_order" class="font-weight-normal">Порядок сортировки</label>
                            <input type="text" class="form-control" id="sort_order" name="sort_order">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
