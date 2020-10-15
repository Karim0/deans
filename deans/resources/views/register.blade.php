@extends('common')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{route('home')}}"><b>Deans</b></a>
                </div>
                @if(isset($_GET['error']))
                    <p class="text-danger">Вы ввели неправильный логин или пароль</p>
                @endif
                <div class="card">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Register a new membership</p>

                        <form action="{{route('post_register')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password"
                                       name="password2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Lastname"
                                       name="lastname">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Patronymic"
                                       name="patronymic">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Gender"
                                       name="gender">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone number"
                                       name="tel">
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Birthdate"
                                       name="birthdate">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Registration Address"
                                       name="registration_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Residential Address"
                                       name="residential_address">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="IIN"
                                       name="iin">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
