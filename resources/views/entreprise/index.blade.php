@extends('partial.template')
@section('title')
Job search
@endsection
@section('content')
<section class="section-background">
    <div class="container">

        @include('partial.sidebare')
        <div class="col-lg-9 col-xs-12">
            @forelse ($jobs as $job)

            <div class="row">
                <div class="col-lg-6 col-md-4 col-sm-6">
                    <div class="courses-thumb courses-thumb-secondary">
                        <div class="courses-top">
                            @if ($job->photo == '?')
                                 <div class="courses-image">
                                    <img src="images/product-1-720x480.jpg" class="img-responsive" alt="">
                                </div>
                            @else
                                 <div class="courses-image">
                                    <img src="{{ $job->photo}}" style='width: 500px; height:250px; ' class="img-responsive" alt="">
                                </div>
                            @endif

                            <div class="courses-date">
                                <span title="Posted on"><i class="fa fa-calendar"></i>{{date('m-d-Y', strtotime($job->created_at))}}</span>
                                <span title="Location"><i class="fa fa-map-marker"></i> London</span>
                                <span title="Type"><i class="fa fa-file"></i> Contract</span>
                            </div>
                        </div>

                        <div class="courses-detail">
                            <h3><a href="job-details.html">{{$job->title}}</a></h3>

                            <p class="lead"><strong>{{$job->salary}}</strong></p>

                            <p>{{$job->qualification}}</p>
                        </div>

                        <div class="courses-info">
                            <a href="{{ route('job.show',$job->id)}}" class="section-btn btn btn-primary btn-block">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <p>Aucune offre Publiée</p>
                @endforelse

            </div>
        </div>
    </div>
    </div>
    <div style="text-align: center; font-weight: bold;"><p>{{$jobs->links()}}</p></div>
</section>

@endsection
