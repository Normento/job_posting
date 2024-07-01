@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')

<section class="section-background">
    <div class="container">
        @include('partial.sidebare')

        <div class="formulaire">

            <form action="{{route('job.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Intitulée du travaille</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Photo d'illustration</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <label for="">Domaine</label>
                <select name="secteur" id="" class="form-control">
                    <option value="Developpement web">Developpement web</option>
                    <option value="Technicien réseaux">Technicien réseaux</option>
                    <option value="Data-Science">Data-Science</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Responsabilité</label>
                    <input type="text" name="responsabilities" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Qualification</label>
                    <textarea name="qualification" class="form-control" id="form6Example7" rows="4"></textarea>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Description du travaille</label>
                    <textarea name="description" class="form-control" id="form6Example7" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Salaire</label>
                    <input type="text" name="salary" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Durée</label>
                    <input type="text" name="dure" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="bouton" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary " name="job">Enrégistrer</button>
                </div>


            </form>
        </div>

    </div>
    </div>
    </div>
    <style>
        .formulaire {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 50px;

        }


        .info {
            text-align: center;
        }
    </style>


    @endsection
