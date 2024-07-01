@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')
<section class="section-background">
    <div class="container">
    @include('partial.sidebare')
    <div class="col-lg-9 col-xs-12">


            <div class="row"> 

    <livewire:conversation :conversation="$conversation">

</div>
    </div>
    </div>
</section>
@endsection
