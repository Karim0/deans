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
                        <li class="breadcrumb-item active" aria-current="page">@lang('messages.student_info')</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 mb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_student">@lang('messages.add')
            </button>
        </div>
        <table class="table table-striped" id="dataTable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('messages.fio')</th>
                <th scope="col">@lang('messages.study_form')</th>
                <th scope="col">@lang('messages.payment_form')</th>
                <th scope="col">@lang('messages.study_lang')</th>
                <th scope="col">@lang('messages.group')</th>
                <th scope="col">@lang('messages.course')</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($student as $st)
                <tr>
                    <th>{{$st->id}}</th>
                    <td>{{$st->user->login}}: {{$st->user->lastname}} {{$st->user->name}}</td>
                    <td>{{$st->study_form['description_'.App()->getLocale()]}}</td>
                    <td>{{$st->payment_form['description_'.App()->getLocale()]}}</td>
                    <td>{{$st->study_lang['title_'.App()->getLocale()]}}</td>
                    <td>{{$st->group['title_'.App()->getLocale()]}}</td>
                    <td>{{$st->course}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('edit-student_page', ['id'=>$st->id])}}"><i
                                class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('delete-student', ['id'=>$st->id])}}"><i
                                class="fa fa-window-close"></i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_student">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('add_student')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex w-100">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control"
                                           placeholder="Enter user login"
                                           aria-label="Search" name="login" id="search_user">
                                    <div class="search-res" id="st_user_res_container">
                                        <ul class="list-group" id="st_user_res">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="d-flex w-100 align-items-center">
                                <select name="group" id="" class="form-control">
                                    @foreach(\App\Models\Groups::all() as $group)
                                        <option
                                            value="{{$group->id}}">{{$group['title_'.App::getLocale()]}}</option>
                                    @endforeach
                                </select>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{route('panel-group')}}"
                                       class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold">
                                        +
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="d-flex w-100 align-items-center">
                                <select name="study_form" id="" class="form-control">
                                    @foreach(\App\Models\StudyForms::all() as $form)
                                        <option
                                            value="{{$form->id}}">{{$form['description_'.App::getLocale()]}}</option>
                                    @endforeach
                                </select>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{route('panel-study_form')}}"
                                       class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold">
                                        +
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="d-flex w-100 align-items-center">
                                <select name="study_lang" id="" class="form-control">
                                    @foreach(\App\Models\StudyLangs::all() as $langs)
                                        <option
                                            value="{{$langs->id}}">{{$langs['title_'.App::getLocale()]}}</option>
                                    @endforeach
                                </select>
                                @if(auth()->user()->isAdmin())
                                    <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                       href="{{route('panel-study_lang')}}">
                                        +
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="d-flex w-100 align-items-center">
                                <select name="payment_form" id="" class="form-control">
                                    @foreach(\App\Models\PaymentForms::all() as $pay)
                                        <option
                                            value="{{$pay->id}}">{{$pay['description_'.App::getLocale()]}}</option>
                                    @endforeach
                                </select>
                                @if(auth()->user()->isAdmin())
                                    <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                       href="{{route('panel-payment_form')}}">
                                        +
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="d-flex w-100 align-items-center">
                                <select name="study_status" id=""
                                        class="form-control flex-grow-1">
                                    @foreach(\App\Models\StudyStatuses::all() as $stat)
                                        <option
                                            value="{{$stat->id}}">{{$stat['description_'.App::getLocale()]}}</option>
                                    @endforeach
                                </select>
                                @if(auth()->user()->isAdmin())
                                    <a class="flex-grow-0 ml-2 bg-transparent text-success border-0 text-bold"
                                       href="{{route('panel-study_status')}}">
                                        +
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="course"
                                   name="course">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @lang('messages.add')
                                </button>
                            </div>
                        </div>
                    </form>
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
