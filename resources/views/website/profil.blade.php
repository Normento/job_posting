@extends('partial.template')
@section('title')
{{Auth::user()->name}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12">
            @if (Auth::user()->status== "Recruteur")
            @foreach ( $profils as $profil )


            <div>
                <br>

                <img src="{{$profil->logo}}" alt="" class="img-responsive wc-image">

                <br>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-xs-12">
            <form action="#" method="post" class="form">
                <h2>{{$profil->company}}</h2>

                <p class="lead">@if ($count > 0)
                <strong class="text-primary">{{ round($ratings / $count)}}</strong> <small><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></small></p>
                @else
                <strong class="text-primary">0</strong> <small><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></small></p>
                @endif
                <p class="lead">
                    <i class="fa fa-briefcase"></i> {{$profil->site_web}} &nbsp;&nbsp;
                    <i class="fa fa-map-marker"></i> {{$profil->localisation}} &nbsp;&nbsp;
                    <!-- <i class="fa fa-calendar"></i> 20-06-2020 &nbsp;&nbsp; -->
                    <i class="fa fa-file"></i> Contract
                </p>


            </form>
            @endforeach
            @endif

            @if (Auth::user()->status== "Chercheur d'emploie")
            @foreach ( $profils as $profil )
            <div>
                <br>

                <img src="{{$profil->photo}}" alt="" class="img-responsive wc-image">

                <br>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-xs-12">
            <form action="#" method="post" class="form">
                <h2>{{Auth::user()->name}}</h2>

                <p class="lead">@if ($count > 0)
                <strong class="text-primary">{{ round($ratings / $count)}}</strong> <small><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></small></p>
                @else
                <strong class="text-primary">0</strong> <small><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i><i class="fa fa-star" style="color: yellow;"></i></small></p>
                @endif

                <p class="lead">
                    <i class="fa fa-briefcase"></i> <a href="{{$profil->cv}}" download>Télécharger votre CV </a> &nbsp;&nbsp;
                    <i class="fa fa-file"></i> {{Auth::user()->email}}  &nbsp;&nbsp;
                    <!-- <i class="fa fa-map-marker"></i>   &nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> 20-06-2020 &nbsp;&nbsp;-->
                </p>

            </form>
            @endforeach
            @endif

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>About </h4>
        </div>

        <div class="panel-body">
            <p>{{$profil->description}}.</p>
            @if (Auth::user()->status == 'Recruteur')


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

                        <strong>{{$profil->company}}</strong>
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

                        <strong><a href="tel:123-456-789">123-456-789</a></strong>
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

                        <strong><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></strong>
                    </p>
                </div>

                <div class="col-md-6">
                    <p>
                        <span>Website</span>

                        <br>

                        <strong><a href="{{$profil->site_web}}">{{$profil->site_web}}</a></strong>
                    </p>
                </div>
            </div>

            <p>
                <span>City</span>

                <br>

                <strong>{{$profil->localisation}}</strong>
            </p>
        </div>
        @endif
    </div>
</div>
</div>

@endsection
