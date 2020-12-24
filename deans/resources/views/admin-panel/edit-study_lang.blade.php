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
                        <label for="title_ru" class="font-weight-normal">Описание на русском</label>
                        <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{$study_langs->title_ru}}">
                    </div>

                    <div class="form-group">
                        <label for="title_en" class="font-weight-normal">Описание на английском</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" value="{{$study_langs->title_en}}">
                    </div>
                    <div class="form-group">
                        <label for="title_kz" class="font-weight-normal">Описание на казахском</label>
                        <input type="text" class="form-control" id="title_kz" name="title_kz" value="{{$study_langs->title_kz}}">
                    </div>

                    <button class="btn btn-primary" type="submit">@lang('messages.edit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
