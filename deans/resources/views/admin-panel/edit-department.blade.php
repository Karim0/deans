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
                        <label for="title_ru" class="font-weight-normal">Заголовок департамента</label>
                        <input class="form-control" name="title_ru" id="title_ru" value="{{$dep->title_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="title_en" class="font-weight-normal">Заголовок департамента на английском</label>
                        <input class="form-control" name="title_en" id="title_en" value="{{$dep->title_en}}">
                    </div>
                    <div class="form-group">
                        <label for="title_kz" class="font-weight-normal">Заголовок департамента на казахском</label>
                        <input class="form-control" name="title_kz" id="title_kz" value="{{$dep->title_kz}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_ru" class="font-weight-normal">Аббревиатура департамента</label>
                        <input class="form-control" name="title_short_ru" id="title_short_ru"
                               value="{{$dep->title_short_ru}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_kz" class="font-weight-normal">Аббревиатура департамента на казахском</label>
                        <input class="form-control" name="title_short_kz" id="title_short_kz"
                               value="{{$dep->title_short_kz}}">
                    </div>
                    <div class="form-group">
                        <label for="title_short_en" class="font-weight-normal">Аббревиатура департамента на английском</label>
                        <input class="form-control" name="title_short_en" id="title_short_en"
                               value="{{$dep->title_short_en}}">
                    </div>
                    <div class="form-group">
                        <label for="include_staff" class="font-weight-normal">Кол-во человек в департаменте</label>
                        <input class="form-control" name="include_staff" id="include_staff"
                               value="{{$dep->include_staff}}">
                    </div>

                    <div class="form-group">
                        <label for="dep_type" class="font-weight-normal">Тип</label>
                        <select name="department_type_id" id="dep_type" class="form-control">
                            @foreach(\App\Models\DepartmentTypes::all() as $type)
                                <option value="{{$type->id}}"
                                        @if($type->id == $dep->type->id) selected @endif>{{$type->description_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="font-weight-normal">Относится к</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="null">Не выбрано</option>
                            @foreach(\App\Models\Departments::all() as $parent)
                                <option value="{{$parent->id}}"
                                        @if($parent->id == $dep->parent_id) selected @endif>{{$parent->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">@lang('messages.edit')</button>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#groups"
                                            data-toggle="tab">Группы</a></li>
                    <li class="nav-item"><a class="nav-link" href="#staff"
                                            data-toggle="tab">Эдвайзеры</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="groups">
                        <div class="row">
                            <div class="col">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Заголовок</th>
                                        <th scope="col">Заголовок на английском</th>
                                        <th scope="col">Заголовок на казахском</th>
                                        <th scope="col">Департамент</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($dep->groups as $gr)
                                        <tr>
                                            <th>{{$gr->id}}</th>
                                            <td>{{$gr->title_ru}}</td>
                                            <td>{{$gr->title_en}}</td>
                                            <td>{{$gr->title_kz}}</td>
                                            <td>{{$gr->departments->title_short_ru}}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{route('edit-group_page', ['id'=>$gr->id])}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger"
                                                   href="{{route('delete-group', ['id'=>$gr->id])}}"><i
                                                        class="fa fa-window-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="staff">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Логин</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Редактировать</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($dep->users as $us)
                                <tr>
                                    <th>{{$us->id}}</th>
                                    <th>{{$us->login}}</th>
                                    <td>{{$us->lastname}} {{$us->name}} {{$us->patronic}}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                           href="{{route('edit-staff_page', ['id'=>$us->staff->id])}}"><i
                                                class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>

    </div>
@endsection
