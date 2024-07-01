
@extends('partial.formtemplate')
@section('title')
Reset Password
@endsection
@section('content')
<div id="login-page">
        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form method="POST" class="form-login" action="{{ route('password.update') }}">
                 @csrf
                <h2 class="form-login-heading">Reset Password</h2>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="login-wrap">
                     <!-- Password Reset Token -->
                     <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" :value="old('email')" autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <br>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password" required>
                    <br>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Reset Password</button>

                </div>
            </form>
        </div>
    </div>
@endsection
