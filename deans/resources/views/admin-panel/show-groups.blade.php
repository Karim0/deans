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
                        <li class="breadcrumb-item active" aria-current="page">Группы</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 mb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_group">Добавить группу
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название группы (ru)</th>
                <th scope="col">Название группы (kz)</th>
                <th scope="col">Название группы (en)</th>
                <th scope="col">Департамент</th>
                <th scope="col">Дата поступления</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($groups as $gr)
                <tr>
                    <th>{{$gr->id}}</th>
                    <td>{{$gr->title_ru}}</td>
                    <td>{{$gr->title_en}}</td>
                    <td>{{$gr->title_kz}}</td>
                    <td>{{$gr->departments->title_short_ru}}</td>
                    <td>{{$gr->hire_date}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('edit-group_page', ['id'=>$gr->id])}}"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('delete-group', ['id'=>$gr->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_group">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_group')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название группы (en)" name="title_en">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название группы (ru)" name="title_ru">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название группы (kz)" name="title_kz">
                        </div>
                        <div class="form-group">
                            <select name="dep_id" id="" class="form-control">
                                @foreach(\App\Models\Departments::all() as $dep)
                                    <option value="{{$dep->id}}">{{$dep->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
