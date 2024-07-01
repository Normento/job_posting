@extends('partial.formtemplate')
@section('title')
Password Confirm
@endsection
@section('content')
<div id="login-page">
    <div class="container">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 danger" :status="session('status')" />
        <form method="POST" class="form-login" action="{{ route('password.confirm')  }}">
            @csrf

            <h2 class="form-login-heading">Password confirm</h2>
            <p>
                This is a secure area of the application. Please confirm your password before continuing. </p>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="login-wrap">
                <input type="password" required autocomplete="current-password" class="form-control" name="password" placeholder="E-mail">
                <br>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
                    Confirmer
                </button>

            </div>
        </form>
    </div>
</div>
@endsection
