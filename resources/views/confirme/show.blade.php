@extends('partial.template')
@section('title')
    Document CV
@endsection
@section('content')
<iframe src="{{$confirme->cv}}" width="1400px" height="700px" frameborder="0"></iframe>

@endsection
