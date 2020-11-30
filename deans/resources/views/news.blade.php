@extends('common')

@section('content')

    <div class="content-wrapper pt-3  m-0">
        <div class="content">
            <div class="container">
                <div class="row mt-3">
                    <div class="p-3 w-100">
                        <h2 class="mb-2">Новости</h2>
                        @foreach($news as $n)
                            <div class="card p-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-black">{{$n->title}}</h5>
                                    <span>{{$n->created_at->locale('ru_RU')->diffForHumans()}}</span>
                                </div>
                                <h6 class="text-black">{{ $n->subtitle }}</h6>
{{--                                <h6 class="text-black">{{$n->subtitle->diffForHumans()}}</h6>--}}

                                <p>{{$n->text}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

