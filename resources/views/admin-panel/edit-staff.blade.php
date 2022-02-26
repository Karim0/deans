@extends('common_admin')
@section('title')
    Admin panel
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"
                               placeholder="Enter user login"
                               aria-label="Search" name="login" id="search_user_st" value="{{$staff->user->login}}">
                        <div class="search-res" id="st_user_res_container_st">
                            <ul class="list-group" id="st_user_res_st">
                            </ul>
                        </div>
                    </div>


                    <div class="form-group">
                        <select name="english_level_id" id="" class="form-control">
                            @foreach(\App\Models\EnglishLevels::all() as $lang)
                                <option
                                    value="{{$lang->id}}"
                                    @if($staff->english_level_id == $lang->id)selected @endif>{{$lang->description_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="academic_degree_id" id="" class="form-control">
                            @foreach(\App\Models\AcademicDegrees::all() as $deg)
                                <option value="{{$deg->id}}"
                                        @if($staff->academic_degree_id == $deg->id)selected @endif>{{$deg->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="academic_rank_id" id="" class="form-control">
                            @foreach(\App\Models\AcademicRank::all() as $rank)
                                <option value="{{$rank->id}}"
                                        @if($staff->academic_rank_id == $rank->id)selected @endif>{{$rank->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-2">
                        <input name="is_foreign" id="is_foreign"
                               class="form-check-input"
                               type="checkbox" @if($staff->is_foreign)checked @endif/>
                        <label for="is_foreign" class="form-check-label">Is
                            foreign</label>
                    </div>
                    <button type="submit" class="btn btn-primary">add staff</button>
                </form>
            </div>
        </div>

        <button class="btn btn-primary mt-2 mb-2" type="button" data-toggle="modal" data-target="#add_group_user">@lang('messages.add')</button>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.title_en')</th>
                <th scope="col">@lang('messages.title_ru')</th>
                <th scope="col">@lang('messages.title_kz')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($staff->user->my_groups as $group)
                <tr>
                    <th>{{$group->id}}</th>
                    <td>{{$group->title_en}}</td>
                    <td>{{$group->title_ru}}</td>
                    <td>{{$group->title_kz}}</td>
                    <td>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete_group_user', ['group_id'=>$group->id, 'user_id'=>$staff->user->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


        <button class="btn btn-primary mt-2 mb-2" type="button" data-toggle="modal" data-target="#add_department_user">@lang('messages.add')</button>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.title_en')</th>
                <th scope="col">@lang('messages.title_ru')</th>
                <th scope="col">@lang('messages.title_kz')</th>
                <th scope="col">@lang('messages.abbreviation_en')</th>
                <th scope="col">@lang('messages.abbreviation_ru')</th>
                <th scope="col">@lang('messages.abbreviation_kz')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($staff->user->departments as $dep)
                <tr>
                    <th>{{$dep->id}}</th>
                    <td>{{$dep->title_en}}</td>
                    <td>{{$dep->title_ru}}</td>
                    <td>{{$dep->title_kz}}</td>
                    <td>{{$dep->title_short_en}}</td>
                    <td>{{$dep->title_short_ru}}</td>
                    <td>{{$dep->title_short_kz}}</td>
                    <td>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete_department_user', ['dep_id'=>$dep->id, 'user_id'=>$staff->user->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_group_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_group_user')}}" method="post">
                        @csrf
                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$staff->user->id}}" hidden>

                        <div class="form-group">
                            <select name="groups_id" id="" class="form-control">
                                @foreach(\App\Models\Groups::all() as $group)
                                    <option value="{{$group->id}}">{{$group->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('messages.add')</button>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_department_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_department_user')}}" method="post">
                        @csrf
                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{$staff->user->id}}" hidden>

                        <div class="form-group">
                            <select name="department_id" id="" class="form-control">
                                @foreach(\App\Models\Departments::all() as $dep)
                                    <option value="{{$dep->id}}">{{$dep->title_ru}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('messages.add')</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
