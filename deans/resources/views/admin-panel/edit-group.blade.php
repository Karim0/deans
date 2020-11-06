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
                    <input type="text" class="form-control" id="title_en" value="-" hidden>
                    <input type="text" class="form-control" id="title_ru" value="-" hidden>
                    <div class="form-group">
                        <label for="title_ru">Название группы</label>
                        <input type="text" class="form-control" id="title_ru" value="{{$group->title_ru}}">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="title_en">Название группы на английском</label>--}}
{{--                        <input type="text" class="form-control" id="title_en" value="{{$group->title_en}}">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="title_kk">Название группы на казахском</label>--}}
{{--                        <input type="text" class="form-control" id="title_ru" value="{{$group->title_kk}}">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="dep_id">Департамент</label>
                        <select name="dep_id" id="dep_id" class="form-control">
                            @foreach(\App\Models\Departments::all() as $departments)
                                <option
                                    value="{{$departments->id}}" @if($group->departments->id == $departments->id) selected @endif>{{$departments->title_short_ru}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
