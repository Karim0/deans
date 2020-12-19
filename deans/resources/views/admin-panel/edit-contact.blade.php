@extends('common_admin')
@section('title')
    Панель администратора
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8 offset-2 mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="font-weight-normal">@lang('messages.title')</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$contacts->title}}">
                    </div>
                    <div class="form-group">
                        <label for="name_owner" class="font-weight-normal">@lang('messages.name_owner')</label>
                        <input type="text" class="form-control" id="name_owner" name="name_owner" value="{{$contacts->name_owner}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="font-weight-normal">@lang('messages.phone_number')</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$contacts->phone_number}}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-normal">@lang('messages.email')</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$contacts->email}}">
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('messages.add')</button>
                </form>
            </div>
        </div>

    </div>
@endsection
