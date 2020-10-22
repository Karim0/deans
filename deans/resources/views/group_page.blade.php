@extends('common')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3">{{$group->title_en}}</h3>

        <div id="accordion">
            @foreach($group->students as $st)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#st{{$st->user->id}}"
                                    aria-expanded="true" aria-controls="collapseOne">
                                {{$st->user->login}}
                                : {{$st->user->lastname}} {{$st->user->name}} {{$st->user->patronymic}}
                            </button>
                        </h5>
                    </div>

                    <div id="st{{$st->user->id}}" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordion">
                        <div class="card-body">
                            @foreach($st->user->orders as $order)
                                <div class="post">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-3">
                                            <p class="m-0">{{$order->created_at}}</p>
                                        </div>

                                        <div class="col-6">
                                            <p class="m-0">
                                                {{$order->cat->description_en}}
                                            </p>
                                        </div>

                                        <div class="col-3">
                                            <a href="#" class="btn btn-success">Load document</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection()
