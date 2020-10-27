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
                <th scope="col">user</th>
                <th scope="col">english_level</th>
                <th scope="col">academic_degree</th>
                <th scope="col">academic_rank</th>
                <th scope="col">is_foreign</th>
                <th scope="col">Events</th>
            </tr>
            </thead>
            <tbody>

            @foreach($staff as $st)
                <tr>
                    <th>{{$st->id}}</th>
                    <td>{{$st->user->login}}: {{$st->user->lastname}} {{$st->user->name}}</td>
                    <td>{{$st->english_level->description_ru}}</td>
                    <td>{{$st->academic_degree->title_ru}}</td>
                    <td>{{$st->academic_rank->title_ru}}</td>
                    @if($st->is_foreign)
                        <td class="text-center"><i class="fa fa-check"></i></td>
                    @else
                        <td class="text-center"><i class="fa fa-times"></i></td>
                    @endif
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
