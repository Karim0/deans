@extends('common')

@section('content')
    <div class="content-wrapper pt-3 m-0">
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($contacts as $cont)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{$cont->title}}</h5>
                                </div>

                                <div class="card-body">
                                    <p><i class="fa fa-user mr-2"></i>{{$cont->name_owner}}</p>
                                    <p><i class="fa fa-phone mr-2"></i>{{$cont->phone_number}}</p>
                                    <p><i class="fa fa-envelope mr-2"></i>{{$cont->email}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

