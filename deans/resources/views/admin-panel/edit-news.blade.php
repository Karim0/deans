@extends('common_admin')
@section('title')
    Панель администратора
@endsection

@section('content')
    <div class="container">
        <form action="{{route('panel-edit_news', ['news'=>$news])}}" method="post">
            @csrf

            <div class="form-group">
                <label for="title" class="font-weight-normal">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">
            </div>

            <div class="form-group">
                <label for="subtitle" class="font-weight-normal">Подзаголовок</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle"  value="{{$news->subtitle}}">
            </div>
            <div class="form-group">
                <label for="text" class="font-weight-normal">Текст новости</label>
                <textarea type="text" class="form-control" id="text" name="text" rows="10">{{$news->text}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
