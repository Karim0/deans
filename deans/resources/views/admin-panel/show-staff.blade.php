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

            @foreach($staff as $dep)
                <tr>
                    <th>{{$dep->id}}</th>
                    <td>{{$dep->user->login}}: {{$dep->user->lastname}} {{$dep->user->name}}</td>
                    <td>{{$dep->english_level->description_ru}}</td>
                    <td>{{$dep->academic_degree->title_ru}}</td>
                    <td>{{$dep->academic_rank->title_ru}}</td>
                    @if($dep->is_foreign)
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
