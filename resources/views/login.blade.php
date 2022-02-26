@extends('common')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="login-box">
                <div class="login-logo">
                    <a href="{{route('home')}}"><b>Деканат</b></a>
                </div>
                @if(isset($_GET['error']))
                    <p class="text-danger">Вы ввели неправильный логин или пароль</p>
                @endif
                <div class="card">
                    <div class="card-body login-card-body">
                        <form action="{{route('post_login')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Логин" name="login">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Пароль" onchange="ch_search()" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                </div>
                            </div>
                        </form>
                        <p class="mb-0">
                            <a href="{{route('register')}}" class="text-center">Зарегистрироваться</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
