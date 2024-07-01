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
              <h6 class="mb-0">Postulant ({{$count}})</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
               @forelse ( $confirmes as $confirme)




                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">{{$confirme->name}}</h6>
                        @if ($confirme->ratings->count() > 0)
                        <span class="mb-2 text-xs">Note: <span class="text-dark font-weight-bold ms-sm-2">{{ round($confirme->ratings->sum('rate') / $confirme->ratings->count())}} <i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></span></span><br>
                        @else
                        <span class="mb-2 text-xs">Note: <span class="text-dark font-weight-bold ms-sm-2">0<i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></span></span><br>
                        @endif


                    <span class="mb-2 text-xs">Profession: <span class="text-dark font-weight-bold ms-sm-2">{{$confirme->activite}}</span></span><br>
                    <span class="mb-2 text-xs">Nationnalité: <span class="text-dark ms-sm-2 font-weight-bold">{{$confirme->pays}}</span></span><br>
                    <span class="text-xs">Télécharger le cv: <span class="text-dark ms-sm-2 font-weight-bold"> <a class="btn btn-info" href="{{$confirme->cv}}" download="">Téléchargé</a> </span></span><br>
                    <span class="text-xs">Lire le cv: <span class="text-dark ms-sm-2 font-weight-bold"> <a  class="btn btn-info" target="blank" href="{{ route('confirme.show', $confirme->id)}}" >Lire</a> </span></span><br>
                    <span class="text-xs">Lettre de motivation: <span class="text-dark ms-sm-2 font-weight-bold">
                        <div>
                        {{$confirme->lettre}}

                    </div> </span></span><br>
                    <span class="text-xs" >Status:


                        @if ($confirme->status == 'Refuser')
                        <span disabled class="btn btn-danger font-weight-bold"  style="margin-bottom: 10px;">{{$confirme->status }} </span>
                        @else
                        <span disabled class="btn btn-success font-weight-bold " style="margin-bottom: 10px;">{{$confirme->status}} </span>
                        @endif
                        @if ($confirme->status == 'Accepter')
                        <a style="margin-bottom: 10px;" href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalNote{{$confirme->id}}">Noté</a>
                        @include('ratin.Notechercheur')

                        @endif
                    </span><br>

                  </div>
                  <div class="ms-auto text-end">
                  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#ModalDelete{{$confirme->num}}">Décision</a>
                  @include('confirme.decision')
                  </div>
                </li>
                @empty
                    <p>Aucun candidat n'a postulé à cet offre</p>
               @endforelse
              </ul>
            </div>
          </div>
        </div>
</div>
<div style="text-align: center;font-weight: bold;">
    <p >{{$confirmes->links()}}</p>
    @if ($confirmes->count() > 0)
         <a class="btn btn-success" href="{{ route('export.postuler')}}?id={{$offre}}&title={{$title}}">Exporter en Excel</a>
    @endif

</div>
 </section>


 @endsection
