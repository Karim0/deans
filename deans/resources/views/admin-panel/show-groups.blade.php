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
                <th scope="col">department</th>
                <th scope="col">Events</th>
            </tr>
            </thead>
            <tbody>

            @foreach($groups as $gr)
                <tr>
                    <th>{{$gr->id}}</th>
                    <td>{{$gr->title_ru}}</td>
                    <td>{{$gr->title_en}}</td>
                    <td>{{$gr->title_kk}}</td>
                    <td>{{$gr->departments->title_short_ru}}</td>
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
