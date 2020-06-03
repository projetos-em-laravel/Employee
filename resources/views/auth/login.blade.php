@extends('layouts.app-login')

@section('content')
<div id="login">
    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
        @csrf

        <span class="login100-form-title p-b-26">
            Welcome
        </span>
        <span class="login100-form-title p-b-48 logo">
            <img src="{{ asset('images/logo.jpg') }}">
        </span>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
            <input type="text" class="input100" name="email" value="{{ old('email') }}" autofocus>
            <span class="focus-input100" data-placeholder="Email"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password" ></span>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>


        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button type="submit" class="login100-form-btn">
                    Login
                </button>
            </div>
        </div>


            <div class="text-center p-t-115">
                <span class="txt1">
                    Don’t have an account?
                </span>

                <a class="txt2" href="{{ route('register') }}">
                    Sign Up
                </a>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center p-t-115">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
    </form>
</div>
@endsection
