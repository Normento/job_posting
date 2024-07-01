@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')

<section class="section-background">
    <div class="container">
        @include('partial.sidebare')

        <div class="formulaire">

            <form action="{{route('job.update',$job->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Intitulée du travaille</label>
                    <input type="text" name="title" value="{{ $job->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Photo d'illustration</label>
                    <input type="file" name="photo"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <label for="">Domaine</label>
                <select name="secteur" id="" class="form-control">
                    <option value="{{ $job->secteur}}">{{ $job->secteur}}</option>
                    <option value="Developpement web">Developpement web</option>
                    <option value="Technicien réseaux">Technicien réseaux</option>
                    <option value="Data-Science">Data-Science</option>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Responsabilité</label>
                    <input type="text" value="{{ $job->responsabilities}}" name="responsabilities" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Qualification</label>
                    <textarea name="qualification" value="" class="form-control" id="form6Example7" rows="4">{{ $job->qualification}}</textarea>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Description du travaille</label>
                    <textarea name="description"  class="form-control" id="form6Example7" rows="4">{{ $job->description}}"</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Salaire</label>
                    <input type="text" name="salary" value="{{ $job->salary}}" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Durée</label>
                    <input type="text" name="dure" value="{{ $job->dure}}" class="form-control" id="exampleInputPassword1">
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
