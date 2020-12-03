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
                        <label for="department_type_id" class="font-weight-normal">Департамент</label>
                        <select name="department_type_id" id="department_type_id" class="form-control">
                            @foreach(\App\Models\DepartmentTypes::all() as $dep)
                                @if($study_forms->degree_id == $dep->id)
                                    <option value="{{$dep->id}}" selected>{{$dep->description_ru}}</option>
                                @else
                                    <option value="{{$dep->id}}">{{$dep->description_ru}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="degree_id" class="font-weight-normal">Степень</label>
                        <select name="degree_id" id="degree_id" class="form-control">
                            @foreach(\App\Models\DegreeTypes::all() as $degree)
                                @if($study_forms->degree_id == $degree->id)
                                    <option value="{{$degree->id}}" selected>{{$degree->title_ru}}</option>
                                @else
                                    <option value="{{$degree->id}}">{{$degree->title_ru}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description_ru" class="font-weight-normal">Название на русском</label>
                        <input type="text" class="form-control" id="description_ru" name="description_ru" value="{{$study_forms->description_ru}}">
                    </div>

                    <div class="form-group">
                        <label for="description_en" class="font-weight-normal">Название на английском</label>
                        <input type="text" class="form-control" id="description_en" name="description_en" value="{{$study_forms->description_en}}">
                    </div>
                    <div class="form-group">
                        <label for="description_kz" class="font-weight-normal">Название на казахском</label>
                        <input type="text" class="form-control" id="description_kz" name="description_kz" value="{{$study_forms->description_kz}}">
                    </div>

                    <div class="form-group">
                        <label for="course_count" class="font-weight-normal">Номер курса</label>
                        <input type="number" class="form-control" id="course_count" name="course_count" value="{{$study_forms->course_count}}">
                    </div>

                    <button class="btn btn-primary" type="submit">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
