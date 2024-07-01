@extends('partial.template')
@section('title')
Acceuill
@endsection
@section('content')

<section>
    <div class="container">
        <div class="row">
            @if ($q )
                @forelse ($jobs as $job)
                    <div class="col-md-4 col-sm-4">
                        <div class="courses-thumb courses-thumb-secondary">
                            <div class="courses-top">
                                <div class="courses-image">
                                    @if ($job->photo == "?")
                                    <img src="{{ asset('images/product-1-720x480.jpg')}}" class="img-responsive" alt="">
                                    @else
                                    <img src="{{ $job->photo}}" class="img-responsive" alt="" style="width: 500px; height:240px;">
                                    @endif

                                </div>
                                <div class="courses-date">
                                    <span title="Posted on"><i class="fa fa-calendar"></i> {{ date('m-d-Y', strtotime($job->created_at))}}</span>
                                    <span title="Location"><i class="fa fa-map-marker"></i> London</span>
                                    <span title="Type"><i class="fa fa-file"></i> Contract</span>
                                </div>
                            </div>

                            <div class="courses-detail">
                                <h3><a href="job-details.html">{{$job->title}}</a></h3>

                                <p class="lead"><strong>{{$job->salary}}</strong></p>

                                <p>{{$job->responsabilities}}</p>
                            </div>

                            <div class="courses-info">
                                <a href="{{ route('website.showjob', $job->id) }}" class="section-btn btn btn-primary btn-block">View Details</a>
                            </div>
                        </div>
                    </div>

                @endforeach
                @else
                Aucun resultat de recherche
            @endif
        </div>
    </div>
    <div style="text-align: center; font-weight: bold;">
        <p>{{$jobs->links()}}</p>
    </div>

</section>

@endsection
