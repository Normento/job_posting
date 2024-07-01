@extends('partial.template')
@section('title')
{{Auth::user()->name}}
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

                              <p class="lead"><strong class="text-primary">{{$job->salary}}</strong> <small> </small></p>

                              <p class="lead">
                                   <i class="fa fa-briefcase"></i> Security / Protective Services Jobs &nbsp;&nbsp;
                                   <i class="fa fa-map-marker"></i> {{$job->entreprise}} &nbsp;&nbsp;
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

               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h4>About Cannon Guards Security ltd</h4>
                    </div>
                        @foreach ($infoEntrepises as $infoEntrepise)
                        <div class="panel-body">
                         <p>{{$infoEntrepise->description}}</p>

                         <div class="row">
                              <div class="col-lg-6">

                              </div>

                              <div class="col-lg-6">

                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-6">
                                   <p>
                                        <span>Company name</span>

                                        <br>

                                        <strong>{{$infoEntrepise->company}}</strong>
                                   </p>
                              </div>

                              <div class="col-md-6">
                                   <p>
                                        <span>Contact name</span>

                                        <br>

                                        <strong>{{Auth::user()->name}}</strong>
                                   </p>
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-6">
                                   <p>
                                        <span>Phone</span>

                                        <br>

                                        <strong><a href="tel:123-456-789">{{$infoEntrepise->phone}}</a></strong>
                                   </p>
                              </div>

                              <div class="col-md-6">
                                   <p>
                                        <span>Mobile phone</span>

                                        <br>

                                        <strong><a href="tel:456789123">456789123</a></strong>
                                   </p>
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-6">
                                   <p>
                                        <span>Email</span>

                                        <br>

                                        <strong><a href="mailto:{{$infoEntrepise->email}}">{{$infoEntrepise->email}}</a></strong>
                                   </p>
                              </div>

                              <div class="col-md-6">
                                   <p>
                                        <span>Website</span>

                                        <br>

                                        <strong><a href="{{$infoEntrepise->site_web}}">{{$infoEntrepise->site_web}}</a></strong>
                                   </p>
                              </div>
                         </div>

                         <p>
                              <span>City</span>

                              <br>

                              <strong>Manchester</strong>
                         </p>
                    </div>
                        @endforeach

               </div>

               <div class="clearfix">
                    <a href="{{ route('confirme')}}?id={{Crypt::encrypt($job->id)}}&title={{Crypt::encrypt($job->title)}}" class="section-btn btn btn-primary pull-left">Postulants</a>

                    <ul class="social-icon pull-right">
                         <!-- <li><a href="#" class="fa fa-facebook"></a></li> -->
                         <li><a href="{{ route('job.edit',$job->id)}}" class="fa fa-edit"></a></li>
                         <li><a href="#" data-toggle="modal" data-target="#ModalDelete{{$job->id}}"><i class="fa fa-trash-o "></i></a></li>
                         @include('entreprise.job.delete')
                    </ul>
               </div>
          </div>
     </section>
     @endsection
