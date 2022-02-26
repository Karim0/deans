@extends('common')


@section('content')
    <div class="container">
        <h1>Add post</h1>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{route('add_post')}}" class="form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Enter title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ful_text">Enter post content</label>
                        <textarea type="text" name="ful_text" id="ful_text" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Enter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
