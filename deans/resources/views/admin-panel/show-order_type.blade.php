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
                        <li class="breadcrumb-item active" aria-current="page">Категории справок</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 mb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_order_type">Добавить категорию справок
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Описание на английском</th>
                <th scope="col">Описание на русском</th>
                <th scope="col">Описание на казахском</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($order_type as $ot)
                <tr>
                    <th>{{$ot->id}}</th>
                    <td>{{$ot->description_en}}</td>
                    <td>{{$ot->description_ru}}</td>
                    <td>{{$ot->description_kz}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary mr-2" href="{{route('edit-order_type_page', ['id'=>$ot->id])}}"><i
                                    class="fa fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{route('delete-order_type', ['id'=>$ot->id])}}"><i
                                    class="fa fa-window-close"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_order_type">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить категорию справок</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-order_type')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="description_ru" class="font-weight-normal">Описание</label>
                            <input type="text" class="form-control" name="description_ru" id="description_ru">
                        </div>
                        <div class="form-group">
                            <label for="description_en" class="font-weight-normal">Описание на английском</label>
                            <input type="text" class="form-control" name="description_en" id="description_en">
                        </div>
                        <div class="form-group">
                            <label for="description_kz" class="font-weight-normal">Описание на казахском</label>
                            <input type="text" class="form-control" name="description_kz" id="description_kz">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
                        <form action="{{route('add_user')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Login" name="login">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Lastname"
                                       name="lastname">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Patronymic"
                                       name="patronymic">
                            </div>
                            <div class="input-group mb-3">
                                <select name="gender" id="g" placeholder="Gender" class="form-control">
                                    @foreach(\App\Models\Gender::all() as $g)
                                        <option value="{{$g->id}}">{{$g->title_ru}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone number"
                                       name="tel">
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Birthdate"
                                       name="birthdate">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Registration Address"
                                       name="registration_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Residential Address"
                                       name="residential_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="IIN"
                                       name="iin">
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary btn-block w-100">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
