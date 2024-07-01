@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')

<section class="section-background">
    <div class="container">
        <div class="formulaire">
            <form action="{{route('website.postuler')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="emploie_id" value="{{$job->id}}">
                @forelse($cv_jobs as $cv_job)
                <div class="mb-3">
                     <input type="hidden" name="cv" class="form-control" value=' {{$cv_job->cv}}' id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                @empty
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Votre Cv</label>
                    <input type="file" name="cv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                @endforelse
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Lettre de motivation</label>
                    <textarea name="lettre" class="form-control" id="form6Example7" rows="4"></textarea>
                </div>
                <div class="buton" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary " name="job">Envoyer</button>
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
