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
                    <div class="input-group mb-3">
                        <div class="d-flex w-100 align-items-center">
                            <select name="group_id" id="" class="form-control">
                                @foreach(\App\Models\Groups::all() as $group)
                                    <option @if($group->id == $student->group_id) selected @endif
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
                            <select name="study_form_id" id="" class="form-control">
                                @foreach(\App\Models\StudyForms::all() as $form)
                                    <option @if($form->id == $student->payment_form_id) selected @endif
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
                            <select name="study_lang_id" id="" class="form-control">
                                @foreach(\App\Models\StudyLangs::all() as $langs)
                                    <option @if($langs->id == $student->study_lang_id) selected @endif
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
                            <select name="payment_form_id" id="" class="form-control">
                                @foreach(\App\Models\PaymentForms::all() as $pay)
                                    <option @if($pay->id == $student->payment_form_id) selected @endif
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
                            <select name="study_status_id" id=""
                                    class="form-control flex-grow-1">
                                @foreach(\App\Models\StudyStatuses::all() as $stat)
                                    <option @if($stat->id == $student->study_status_id) selected @endif
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
                               name="course" value="{{$student->course}}">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                @lang('messages.edit')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
