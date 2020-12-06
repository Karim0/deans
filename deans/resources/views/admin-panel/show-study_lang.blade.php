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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">Панель администратора</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Язык обучения</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_study_langs">Добавить
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название на русском</th>
                <th scope="col">Название на английском</th>
                <th scope="col">Название на казахском</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($study_langs as $lang)
                <tr>
                    <th>{{$lang->id}}</th>
                    <td>{{$lang->title_kz}}</td>
                    <td>{{$lang->title_ru}}</td>
                    <td>{{$lang->title_en}}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                           href="{{route('edit-study_lang_page', ['id'=>$lang->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete-study_lang', ['id'=>$lang->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_study_langs">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-study_lang')}}" method="post">
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

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection