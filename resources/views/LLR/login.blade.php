@extends('layout.app')
@section('title', 'Login')
@section('content')
    <div class="register-login-main d-block mx-auto">
        @if ($message = Session::get('success'))
            <span class="alert alert-success d-block mx-auto text-center"><i class="fa-solid fa-dragon"></i>  {{$message}}</span>
        @endif
        @if ($message = Session::get('fail'))
            <span class="alert alert-success d-block mx-auto text-center"><i class="fa-solid fa-triangle-exclamation"></i>  {{$message}}</span>
        @endif
        <div class="container register-login-div ">
            <p class="text-center bg-primary text-light p-1 py-2 d-block w-25 rounded mx-auto">My Social</p>
            <h5 class="text-center">Login in to Your Account</h5>
            <p class="text-center">
                <i class="fa-solid fa-mug-hot"></i>
                 Welcome Back !
                <i class="fa-solid fa-mug-hot"></i>
            </p>
            <form action="{{route('login_validate')}}" method="post">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Emain">
                    <label for="email">Enter Your Email</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                    <label for="password">Enter Your Password</label>
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
