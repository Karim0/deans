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
                                <input type="text" class="form-control" placeholder="Full name" name="name" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="login" class="form-control" placeholder="Login" name="login" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password"
                                       name="password2" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Lastname"
                                       name="lastname" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Patronymic"
                                       name="patronymic" required>
                            </div>
                            <div class="input-group mb-3">
                                <select name="gender" class="form-control" required>
                                    @foreach(\App\Models\Gender::all() as $gen)
                                        <option value="{{$gen->id}}">{{$gen->title_en}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone number"
                                       name="tel" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Birthdate"
                                       name="birthdate" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Registration Address"
                                       name="registration_address" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Residential Address"
                                       name="residential_address" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="IIN"
                                       name="iin" required>
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
