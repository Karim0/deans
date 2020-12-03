@extends('common_admin')
@section('title')
    Панель администратора
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8 offset-2 mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="sort_order" class="font-weight-normal">Порядок сортировки</label>
                        <input type="text" class="form-control" id="sort_order" name="sort_order" value="{{$english_levels->sort_order}}">
                    </div>

                    <div class="form-group">
                        <label for="name" class="font-weight-normal">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$english_levels->name}}">
                    </div>

                    <div class="form-group">
                        <label for="description_ru" class="font-weight-normal">Описание на русском</label>
                        <input type="text" class="form-control" id="description_ru" name="description_ru" value="{{$english_levels->description_ru}}">
                    </div>

                    <div class="form-group">
                        <label for="description_en" class="font-weight-normal">Описание на английском</label>
                        <input type="text" class="form-control" id="description_en" name="description_en" value="{{$english_levels->description_en}}">
                    </div>
                    <div class="form-group">
                        <label for="description_kz" class="font-weight-normal">Описание на казахском</label>
                        <input type="text" class="form-control" id="description_kz" name="description_kz" value="{{$english_levels->description_kz}}">
                    </div>

                    <button class="btn btn-primary" type="submit">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
