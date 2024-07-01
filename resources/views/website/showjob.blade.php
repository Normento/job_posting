@extends('partial.template')
@section('title')
@if (isset(Auth::user()->name))
{{Auth::user()->name}}
@else
Details
@endif
@endsection
@section('content')
<section>
          <div class="container">
               <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                         <div>
                              <br>
                                @if ($job->photo == '0')
                                <img src="{{ asset('images/product-1-720x480.jpg')}}" alt="" class="img-responsive wc-image">
                                @else
                                <img src="{{ $job->photo}}" alt="" class="img-responsive wc-image">
                                @endif


                              <br>
                         </div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-xs-12">
                         <form action="#" method="post" class="form">
                              <h2>{{$job->title}}</h2>

                              <p class="lead"><strong class="text-primary">{{$job->salary}}</strong><small></small></p>

                              <p class="lead">
                                   <i class="fa fa-briefcase"></i> Security / Protective Services Jobs &nbsp;&nbsp;
                                   <i class="fa fa-map-marker"></i> London &nbsp;&nbsp;
                                   <i class="fa fa-calendar"></i> {{date('m-d-Y',strtotime($job->created_at))}} &nbsp;&nbsp;
                                   <i class="fa fa-file"></i> Contract
                              </p>


                         </form>
                    </div>
               </div>

               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h4>Description du travaille</h4>
                    </div>

                    <div class="panel-body">
                         <p>{{$job->description}}</p>

                         <h4>Responsibillitites:</h4>

                         <p>{{$job->responsabilities}}</p>

                         <h4>Qualifications:</h4>
                         <p>{{$job->qualification}}</p>
                    </div>
               </div>
               <div class="clearfix">
                    @auth
                    @if ($job->user_id != Auth::user()->id)

                    <a href="{{ route('website.apply',$job->id)}}" class="section-btn btn btn-primary pull-left">Apply for this job</a>
                    @endif
                    @else
                        Veuillez vous connecté
                    @endauth



               </div>
          </div>
     </section>
     @endsection
