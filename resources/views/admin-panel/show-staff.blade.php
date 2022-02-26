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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">@lang('messages.home')</a></li>
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">@lang('messages.admin_panel')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.staff_info')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 mb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_staff">Добавить работника
            </button>
        </div>
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Упрвень английского</th>
                <th scope="col">Ученая степень</th>
                <th scope="col">Учёное звание</th>
                <th scope="col">Иностранец</th>
                <th scope="col"></th>
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
                        <a class="btn btn-primary" href="{{route('edit-staff_page', ['id'=>$st->id])}}"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('delete-staff', ['id'=>$st->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_staff">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_staff')}}" method="post">
                        @csrf
                        <div class="form-group d-flex">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control"
                                       placeholder="Enter user login"
                                       aria-label="Search" name="login" id="search_user_st">
                                <div class="search-res" id="st_user_res_container_st">
                                    <ul class="list-group" id="st_user_res_st">
                                    </ul>
                                </div>
                            </div>

                            <button type="button"
                                    class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                    data-toggle="modal" data-target="#add_user">
                                +
                            </button>
                        </div>


                        <div class="form-group">
                            <select name="english_level_id" id="" class="form-control">
                                @foreach(\App\Models\EnglishLevels::all() as $lang)
                                    <option
                                        value="{{$lang->id}}">{{$lang->description_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="academic_degree_id" id="" class="form-control">
                                @foreach(\App\Models\AcademicDegrees::all() as $deg)
                                    <option value="{{$deg->id}}">{{$deg->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="academic_rank_id" id="" class="form-control">
                                @foreach(\App\Models\AcademicRank::all() as $rank)
                                    <option
                                        value="{{$rank->id}}">{{$rank->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check mb-2">
                            <input name="is_foreign" id="is_foreign"
                                   class="form-check-input"
                                   type="checkbox"/>
                            <label for="is_foreign" class="form-check-label">Is
                                foreign</label>
                        </div>
                        <button type="submit" class="btn btn-primary">add staff</button>
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
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
