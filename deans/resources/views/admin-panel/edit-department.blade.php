@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')
    <div class="container">

        <div class="row pt-3">
            <div class="col">
                <form class="col-6 offset-3" action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title_ru">Заголовок департамента на русском</label>
                        <input class="form-control" name="title_ru" id="title_ru" value="{{$dep->title_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="title_en">Заголовок департамента на английском</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{$dep->title_en}}">
                    </div>
                    <div class="form-group">
                        <label for="title_kk">Заголовок департамента на казахском</label>
                        <input class="form-control" name="title_kk" id="title_kk" value="{{$dep->title_kk}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_ru">Аббревиатура департамента на русском</label>
                        <input class="form-control" name="title_short_ru" id="title_short_ru"
                               value="{{$dep->title_short_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_kk">Аббревиатура департамента на казахском</label>
                        <input class="form-control" name="title_short_kk" id="title_short_kk"
                               value="{{$dep->title_short_kk}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_en">Аббревиатура департамента на английском</label>
                        <input class="form-control" name="title_short_en" id="title_short_en"
                               value="{{$dep->title_short_en}}">
                    </div>

                    <div class="form-group">
                        <label for="include_staff">Кол-во человек в департаменте</label>
                        <input class="form-control" name="include_staff" id="include_staff"
                               value="{{$dep->include_staff}}">
                    </div>

                    <div class="form-group">
                        <label for="dep_type"></label>
                        <select name="department_type_id" id="dep_type" class="form-control">
                            @foreach(\App\Models\DepartmentTypes::all() as $type)
                                <option value="{{$type->id}}"
                                        @if($type->id == $dep->type->id) selected @endif>{{$type->description_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="null">Не выбрано</option>
                            @foreach(\App\Models\Departments::all() as $parent)
                                <option value="{{$parent->id}}"
                                        @if($parent->id == $dep->parent_id) selected @endif>{{$parent->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title_ru</th>
                        <th scope="col">title_en</th>
                        <th scope="col">title_kk</th>
                        <th scope="col">department</th>
                        <th scope="col">Events</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dep->groups as $gr)
                        <tr>
                            <th>{{$gr->id}}</th>
                            <td>{{$gr->title_ru}}</td>
                            <td>{{$gr->title_en}}</td>
                            <td>{{$gr->title_kk}}</td>
                            <td>{{$gr->departments->title_short_ru}}</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-window-close"></i></button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
