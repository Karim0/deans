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
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.contact')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_contacts">Добавить
            </button>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.title')</th>
                <th scope="col">@lang('messages.name_owner')</th>
                <th scope="col">@lang('messages.phone_number')</th>
                <th scope="col">@lang('messages.email')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($contacts as $contact)
                <tr>
                    <th>{{$contact->id}}</th>
                    <td>{{$contact->title}}</td>
                    <td>{{$contact->name_owner}}</td>
                    <td>{{$contact->phone_number}}</td>
                    <td>{{$contact->email}}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                           href="{{route('edit-contact_page', ['id'=>$contact->id])}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger text-white"
                           href="{{route('delete-contact', ['id'=>$contact->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_contacts">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить ученая степень</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add-contact')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="font-weight-normal">@lang('messages.title')</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="name_owner" class="font-weight-normal">@lang('messages.name_owner')</label>
                            <input type="text" class="form-control" id="name_owner" name="name_owner">
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="font-weight-normal">@lang('messages.phone_number')</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-normal">@lang('messages.email')</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('messages.add')</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
