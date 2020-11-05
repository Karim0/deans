@extends('common_admin')
@section('title')
    Панель администратора
@endsection

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Справка</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $dep)
                <tr>
                    <th>{{$dep->id}}</th>
                    <td>{{$dep->user->login}}: {{$dep->user->name}} {{$dep->user->lastname}}</td>
                    <td>{{$dep->cat->description_ru}}</td>
                    <td>{{$dep->status->description_ru}}</td>
                    <td>
                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-window-close"></i></button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
