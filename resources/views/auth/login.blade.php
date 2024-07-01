@extends('partial.formtemplate')
@section('title')
LOGIN
@endsection
@section('content')
<div id="login-page">
        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form method="POST" class="form-login" action="{{ route('login') }}">
                 @csrf
                <h2 class="form-login-heading">login now</h2>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="login-wrap">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" :value="old('email')" autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox" name="remember"> Remember me
                        <span class="pull-right">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request')}}"> Forgot Password?</a>
                            @endif
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
                    <hr>
                    <div class="login-social-link centered">
                        <p>or you can sign in via your social network</p>
                        <!-- <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button> -->
                        <p class="btn btn-theme btn-block btn-twitter"  ><i class="fa fa-linkedin"></i> <a href="{{ url('auth/linkedin') }}"> Linkedin</a></p>
                    </div>
                    <div class="registration">
                        Don't have an account yet?<br />
                        <a class="" href="{{route('register')}}">
                            Create an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
