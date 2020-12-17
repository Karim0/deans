@extends('common')

@section('content')
    <div class="content-wrapper pt-3  m-0">
        <div class="content">
            <div class="container">
                <div class="row mt-3">
                    <div class="p-3 w-100">
                        <h2 class="mb-2">@lang('messages.news')</h2>
                        @foreach($news as $n)
                            <div class="card p-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-black">{{$n->title}}</h5>
                                    @if(isset($n->created_at))
                                        <span>{{$n->created_at->locale('ru_RU')->diffForHumans()}}</span>
                                    @endif
                                </div>
                                <h6 class="text-black">{{ $n->subtitle }}</h6>
                                <p>{!! $n->text !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

