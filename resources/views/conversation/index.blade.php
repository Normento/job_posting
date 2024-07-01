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
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                <h1 class="text-3l text-green-500 mb-5 ">Vos conversations</h1>
                                @forelse ($conversations as $conversation)
                                <div class="card">
                                    <a href="{{ route('conversation.show',$conversation->id)}}">
                                        <p>{{Illuminate\Support\Str::limit($conversation->messages->last()->content, 50)}}</p>
                                        <p>Envoyé par <strong>{{Auth::user()->id == $conversation->messages->last()->user->id
                ? 'Vous': $conversation->messages->last()->user->name
                 }} </strong> il y a {{$conversation->messages->last()->created_at->diffForHumans()}} </p>
                                    </a>
                                </div>
                                <hr>
                                @empty
                                Aucune conversation

                                @endforelse
                        </div>
                        <div style="text-align: center;">
                            <p>{{$conversations->links()}}</p>
                        </div>
                    </div>
</section>
@endsection
