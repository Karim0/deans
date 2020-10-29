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
                                    value="{{$lang->id}}" @if($staff->english_level_id == $lang->id)selected @endif>{{$lang->description_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="academic_degree_id" id="" class="form-control">
                            @foreach(\App\Models\AcademicDegrees::all() as $deg)
                                <option value="{{$deg->id}}" @if($staff->academic_degree_id == $deg->id)selected @endif>{{$deg->title_ru}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="academic_rank_id" id="" class="form-control">
                            @foreach(\App\Models\AcademicRank::all() as $rank)
                                <option value="{{$rank->id}}" @if($staff->academic_rank_id == $rank->id)selected @endif>{{$rank->title_ru}}</option>
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
    </div>
@endsection
