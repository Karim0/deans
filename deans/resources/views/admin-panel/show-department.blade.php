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
                        <li class="breadcrumb-item active" aria-current="page">Департаменты</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 mb-3">
            <div class="col">
                <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal" data-target="#modal_add">Добавить департамент
                </button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                {{--                <th scope="col">Заголовок (en)</th>--}}
                {{--                <th scope="col">Заголовок (kk)</th>--}}
                <th scope="col">Аббревиатура</th>
                {{--                <th scope="col">Аббревиатура (en)</th>--}}
                {{--                <th scope="col">Аббревиатура (kk)</th>--}}
                <th scope="col">Кол-во сотрудников</th>
                <th scope="col">Тип</th>
                <th scope="col">Относится к</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($departments as $dep)
                <tr>
                    <th>{{$dep->id}}</th>
                    <td>{{$dep->title_ru}}</td>
                    {{--                    <td>{{$dep->title_en}}</td>--}}
                    {{--                    <td>{{$dep->title_kk}}</td>--}}
                    <td>{{$dep->title_short_ru}}</td>
                    {{--                    <td>{{$dep->title_short_en}}</td>--}}
                    {{--                    <td>{{$dep->title_short_kk}}</td>--}}
                    <td>{{$dep->include_staff}}</td>
                    <td>{{$dep->type->description_ru}}</td>
                    @if($dep->parent != null)
                        <td>{{$dep->parent->title_short_ru}}</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="{{route('edit-department_page', ['id'=>$dep->id])}}"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('delete-department', ['id'=>$dep->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="modal_add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form class="col-10 offset-1" action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title_ru" class="font-weight-normal">Заголовок департамента</label>
                                <input class="form-control" name="title_ru" id="title_ru">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="title_en">Заголовок департамента на английском</label>--}}
                            <input class="form-control" name="title_en" id="title_en" value="-" hidden>
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="title_kk">Заголовок департамента на казахском</label>--}}
                            <input class="form-control" name="title_kk" id="title_kk" value="-" hidden>
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="title_short_ru" class="font-weight-normal">Аббревиатура департамента</label>
                                <input class="form-control" name="title_short_ru" id="title_short_ru">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="title_short_kk">Аббревиатура департамента на казахском</label>--}}
                            <input class="form-control" name="title_short_kk" id="title_short_kk" value="-" hidden>
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="title_short_en">Аббревиатура департамента на английском</label>--}}
                            <input class="form-control" name="title_short_en" id="title_short_en" value="-" hidden>
                            {{--                            </div>--}}

                            <div class="form-group">
                                <label for="include_staff" class="font-weight-normal">Кол-во человек в департаменте</label>
                                <input class="form-control" name="include_staff" id="include_staff">
                            </div>

                            <div class="form-group">
                                <label for="dep_type" class="font-weight-normal">Тип</label>
                                <select name="department_type_id" id="dep_type" class="form-control">
                                    @foreach(\App\Models\DepartmentTypes::all() as $type)
                                        <option value="{{$type->id}}">{{$type->description_ru}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id" class="font-weight-normal">Относится к</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="null">Не выбрано</option>
                                    @foreach(\App\Models\Departments::all() as $parent)
                                        <option value="{{$parent->id}}">{{$parent->title_ru}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
