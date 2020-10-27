@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')
    <div class="container">
        <div class="row pt-3 mb-3">
            <div class="col">
                <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal" data-target="#modal_add">Добавить департамент</button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title_ru</th>
                <th scope="col">title_en</th>
                <th scope="col">title_kk</th>
                <th scope="col">title_short_ru</th>
                <th scope="col">title_short_en</th>
                <th scope="col">title_short_kk</th>
                <th scope="col">include_staff</th>
                <th scope="col">department_type</th>
                <th scope="col">Events</th>
            </tr>
            </thead>
            <tbody>

            @foreach($departments as $dep)
                <tr>
                    <th>{{$dep->id}}</th>
                    <td>{{$dep->title_ru}}</td>
                    <td>{{$dep->title_en}}</td>
                    <td>{{$dep->title_kk}}</td>
                    <td>{{$dep->title_short_ru}}</td>
                    <td>{{$dep->title_short_en}}</td>
                    <td>{{$dep->title_short_kk}}</td>
                    <td>{{$dep->include_staff}}</td>
                    <td>{{$dep->type->description_ru}}</td>
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
                                <label for="title_ru">Заголовок департамента на русском</label>
                                <input class="form-control" name="title_ru" id="title_ru">
                            </div>
                            <div class="form-group">
                                <label for="title_en">Заголовок департамента на английском</label>
                                <input class="form-control" name="title_en" id="title_en">
                            </div>
                            <div class="form-group">
                                <label for="title_kk">Заголовок департамента на казахском</label>
                                <input class="form-control" name="title_kk" id="title_kk">
                            </div>
                            <div class="form-group">
                                <label for="title_short_ru">Аббревиатура департамента на русском</label>
                                <input class="form-control" name="title_short_ru" id="title_short_ru">
                            </div>
                            <div class="form-group">
                                <label for="title_short_kk">Аббревиатура департамента на казахском</label>
                                <input class="form-control" name="title_short_kk" id="title_short_kk">
                            </div>
                            <div class="form-group">
                                <label for="title_short_en">Аббревиатура департамента на английском</label>
                                <input class="form-control" name="title_short_en" id="title_short_en">
                            </div>

                            <div class="form-group">
                                <label for="include_staff">Кол-во человек в департаменте</label>
                                <input class="form-control" name="include_staff" id="include_staff">
                            </div>

                            <div class="form-group">
                                <label for="dep_type"></label>
                                <select name="department_type_id" id="dep_type" class="form-control">
                                    @foreach(\App\Models\DepartmentTypes::all() as $type)
                                        <option value="{{$type->id}}">{{$type->description_ru}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Parent</label>
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
