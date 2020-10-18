@extends('common')

@section('content')
    @if(auth()->check())
        <div class="content-wrapper pt-3  m-0">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <form action="{{route('add_order')}}" method="post" class="form-inline">
                                @csrf
                                <input type="number" name="user_id" value="{{auth()->user()['id']}}" hidden>
                                <div class="form-group flex-grow-1">
                                    <select class="form-control w-100" name="order_cat_id" id="order_cat">
                                        @foreach(\App\Models\StudentOrderCategories::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->description_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Send</button>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="bg-white p-3 w-100">
                            <h2 class="mb-2">Мои справки</h2>
                            @foreach($orders as $order)
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
            </div>
        </div>
    @else
        <h2 class="text-center">Пожалуйста авторизуйтесь</h2>

    @endif
@endsection

