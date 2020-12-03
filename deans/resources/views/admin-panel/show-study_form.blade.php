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
                        <li class="breadcrumb-item active" aria-current="page">Язык обучения</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_study_forms">Добавить
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Департамент</th>
                <th scope="col">Степень</th>
                <th scope="col">Описание на русском</th>
                <th scope="col">Описание на английском</th>
                <th scope="col">Описание на казахском</th>
                <th scope="col">Номер курса</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($study_forms as $lang)
                <tr>
                    <th>{{$lang->id}}</th>
                    <td>{{$lang->department_type->description_ru}}</td>
                    <td>{{$lang->degree_type->title_ru}}</td>
                    <td>{{$lang->description_kz}}</td>
                    <td>{{$lang->description_ru}}</td>
                    <td>{{$lang->description_en}}</td>
                    <td>{{$lang->course_count}}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                           href="{{route('edit-study_form_page', ['id'=>$lang->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete-study_form', ['id'=>$lang->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_study_forms">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-study_form')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="department_type_id" class="font-weight-normal">Департамент</label>
                            <select name="department_type_id" id="department_type_id" class="form-control">
                                @foreach(\App\Models\DepartmentTypes::all() as $dep)
                                    <option value="{{$dep->id}}">{{$dep->description_ru}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="degree_id" class="font-weight-normal">Степень</label>
                            <select name="degree_id" id="degree_id" class="form-control">
                                @foreach(\App\Models\DegreeTypes::all() as $degree)
                                    <option value="{{$degree->id}}">{{$degree->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description_ru" class="font-weight-normal">Название на русском</label>
                            <input type="text" class="form-control" id="description_ru" name="description_ru">
                        </div>

                        <div class="form-group">
                            <label for="description_en" class="font-weight-normal">Название на английском</label>
                            <input type="text" class="form-control" id="description_en" name="description_en">
                        </div>
                        <div class="form-group">
                            <label for="description_kz" class="font-weight-normal">Название на казахском</label>
                            <input type="text" class="form-control" id="description_kz" name="description_kz">
                        </div>

                        <div class="form-group">
                            <label for="course_count" class="font-weight-normal">Номер курса</label>
                            <input type="number" class="form-control" id="course_count" name="course_count">
                        </div>


                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
