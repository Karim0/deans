@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-3">
                <form action="" method="post">
                    @csrf
                    <input type="text" class="form-control" name="description_kz" id="description_kz" value="-" hidden>
                    <input type="text" class="form-control" name="description_en" id="description_en" value="-" hidden>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="description_en">Описание на английском</label>--}}
                    {{--                        <input type="text" class="form-control" name="description_en" id="description_en"--}}
                    {{--                               value="{{$order_type->description_en}}">--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <label for="description_ru">Описание на русском</label>
                        <input type="text" class="form-control" name="description_ru" id="description_ru"
                               value="{{$order_type->description_ru}}">
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="description_kz">Описание на казахском</label>--}}
                    {{--                        <input type="text" class="form-control" name="description_kz" id="description_kz"--}}
                    {{--                               value="{{$order_type->description_kz}}">--}}
                    {{--                    </div>--}}

                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
