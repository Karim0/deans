@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')
    <div class="container">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student</th>
                <th scope="col">Order</th>
                <th scope="col">Status</th>
                <th scope="col">Events</th>
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
