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
                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-window-close"></i></button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
