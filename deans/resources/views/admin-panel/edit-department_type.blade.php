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
                        <label for="description_ru">Название на русском</label>
                        <input type="text" class="form-control" id="description_ru" name="description_ru"
                               value="{{$department_types->description_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="description_en">Название на английском</label>
                        <input type="text" class="form-control" id="description_en" name="description_en"
                               value="{{$department_types->description_en}}">
                    </div>
                    <div class="form-group">
                        <label for="description_kz">Название на казахском</label>
                        <input type="text" class="form-control" id="description_kz" name="description_kz"
                               value="{{$department_types->description_kz}}">
                    </div>

                    <button class="btn btn-primary" type="submit">@lang('messages.edit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
