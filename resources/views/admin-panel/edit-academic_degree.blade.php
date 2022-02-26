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
                        <label for="title_ru">Название на русском</label>
                        <input type="text" class="form-control" id="title_ru" name="title_ru"
                               value="{{$academic_degrees->title_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="title_en">Название на английском</label>
                        <input type="text" class="form-control" id="title_en" name="title_en"
                               value="{{$academic_degrees->title_en}}">
                    </div>
                    <div class="form-group">
                        <label for="title_kz">Название на казахском</label>
                        <input type="text" class="form-control" id="title_kz" name="title_kz"
                               value="{{$academic_degrees->title_kz}}">
                    </div>

                    <div class="form-group">
                        <label for="sort_order" class="font-weight-normal">Порядок сортировки</label>
                        <input type="text" class="form-control" id="sort_order" name="sort_order"
                               value="{{$academic_degrees->sort_order}}">
                    </div>

                    <button class="btn btn-primary" type="submit">@lang('messages.edit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
