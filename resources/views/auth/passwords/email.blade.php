@extends('layouts.app-login')

@section('content')
<div id="login">
    <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
        @csrf

        <span class="login100-form-title p-b-26">
            Reset Password
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

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button type="submit" class="login100-form-btn">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection
