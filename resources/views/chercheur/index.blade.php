@extends('partial.template')
@section('title')
    {{Auth::user()->name}}
 @endsection
 @section('content')
 <section class="section-background">
    <div class="container">
    @include('partial.sidebare')
    <div class="card-body pt-4 p-3">
    <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Mes missions ({{$count}})</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
               @forelse ( $poste_emploies as $poste_emploie)


                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">{{$poste_emploie->title}}</h6>
                    <span class="mb-2 text-xs">Responsabilité: <span class="text-dark font-weight-bold ms-sm-2">{{$poste_emploie->responsabilities}}</span></span><br>
                    <span class="mb-2 text-xs">Durée: <span class="text-dark ms-sm-2 font-weight-bold">{{$poste_emploie->dure}}</span></span><br>
                    <span class="text-xs">Salaire: <span class="text-dark ms-sm-2 font-weight-bold">{{$poste_emploie->salary}}</span></span><br>
                    <span class="text-xs">Status:
                        @if ($poste_emploie->status == 'Refuser')
                        <span disabled class="btn btn-danger font-weight-bold"> {{$poste_emploie->status }} </span>
                        @else
                        <span disabled class="btn btn-success font-weight-bold"> {{$poste_emploie->status}} </span>
                        @endif
                    </span><br>
                  </div>
                </li>
                @empty
                    <p>Vous n'avez postulé à aucun offre</p>
               @endforelse
              </ul>
            </div>
          </div>
        </div>
</div>
<div style="text-align: center;font-weight: bold;"><p >{{$poste_emploies->links()}}</p></div>
 </section>

 @endsection
