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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">Панель администратора</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Новости</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <button type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#add_study_langs">Добавить
            </button>
        </div>

        <div class="news_container">
            @foreach($news as $n)
                <div class="card">
                    <div class="card-body">
                        <h5>{!!$n->title!!}</h5>
                        <h6>{!!$n->subtitle!!}</h6>

                        <p>{!! $n->text !!}</p>

                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary mr-2" href="{{route('panel-edit_page_news', ['news'=>$n])}}"><i
                                    class="fa fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{route('panel-delete_news', ['news'=>$n])}}"><i
                                    class="fa fa-window-close"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="add_study_langs">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить новость</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('panel-add_news')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="font-weight-normal">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="subtitle" class="font-weight-normal">Подзаголовок</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="text" class="font-weight-normal">Текст новости</label>
                            <textarea type="text" class="form-control" id="text" name="text" rows="10"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        ClassicEditor
            .create(document.querySelector('#text'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
