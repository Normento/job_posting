@extends('partial.formtemplate')
@section('title')
        Register
@endsection

@section('content')
<div id="login-page">
        <div class="container">
            <form method="post" class="form-login" action="{{ route('user.update', Auth::user()->id) }}">
            {{method_field('put') }}
            {{ csrf_field() }}

                <div class="login-wrap">

                    <div class="input">
                        <input type="text" class="form-control" name="pays" placeholder="Pays" :value="old('nation')">
                       <br>
                    </div>
                    <div class="input">
                        <input type="date" class="form-control" name="date_naissance" placeholder="Date de naissance" :value="old('datenaiss')">
                        <br>
                    </div>
                    <div class="input">
                        <select name="status" class="form-control" id="">
                            <option value="">Qui êtes-vous? </option>
                            <option value="Recruteur">Recruteur</option>
                            <option value="Chercheur d'emploie">Chercheur d'emploie</option>
                        </select>
                        <br>
                    </div>
                    <div class="input">
                        <select name="activite" class="form-control" id="">
                            <option value="">Votre secteur d'activté </option>
                            <option value="Développement web">Développement web</option>
                            <option value="Réseau">Réseau</option>
                        </select>
                        <br>
                    </div>
                    <div class="input">
                        <select name="sexe" class="form-control" id="">
                            <option value="">Choisir le sexe</option>
                            <option value="F">Féminin</option>
                            <option value="M">Masculin</option>
                        </select>
                       <br>
                    </div>

                    <div class="input">
                        <input type="hidden" class="form-control" name="addresse_ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" autocomplete="new-password">
                        <br>
                    </div>
                    <button class="btn btn-warning btn-block" type="submit"> Continuer</button>

                </div>
            </form>
        </div>
    </div>
@endsection
