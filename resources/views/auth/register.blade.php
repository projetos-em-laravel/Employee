@extends('layouts.app-login')

@section('content')
<div id="register">
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        @csrf

        <span class="login100-form-title p-b-26">
            Register
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

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
            <input type="text" class="input100" name="name" value="{{ old('name') }}" autofocus>
            <span class="focus-input100" data-placeholder="Name"></span>
        </div>

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

        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100" data-placeholder="password_confirmation" ></span>
        </div>


        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Register
                </button>
            </div>
        </div>


            <div class="text-center p-t-115">
                <span class="txt1">
                    Don’t have an account?
                </span>

                <a class="txt2" href="{{ route('login') }}">
                    Sign In
                </a>
            </div>
    </form>
</div>
@endsection
