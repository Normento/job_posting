
@extends('partial.formtemplate')
@section('title')
    Forgot Password
@endsection
@section('content')
<div id="login-page">
        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form method="POST" class="form-login" action="{{ route('password.email')  }}">
                @csrf

                <h2 class="form-login-heading">Forgot Password</h2><p>
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="login-wrap">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" :value="old('email')" autofocus>
                    <br>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
                     Email Password Reset Link
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection
