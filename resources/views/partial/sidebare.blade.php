<div class="row">
    <div class="col-lg-3 col-xs-12 ">
        <div class="form">

                <h4>MENU</h4>
                @if (Auth::user()->status == "Recruteur")

                <div>
                    <a href="{{ route('entreprise.index')}}">Offres Publiés</a>
                </div>
                <div>
                    <a href="{{ route('job.create')}}">Poster un job</a>
                </div>

                <div>
                    <a href="{{ route('website.profil')}}">Profil</a>
                </div>
                <div>
                    <a href="{{ route('mission')}}">Mes Missions</a>
                </div>

                @endif
                @if (Auth::user()->status == "Chercheur d'emploie")
                <div>
                    <a href="{{ route('chercheur.index')}}">Mes Missions</a>
                </div>

                <div>
                    <a href="{{ route('website.profil')}}">Profil</a>
                </div>

                @endif

                <div>
                    <a href="{{ route('conversation.index')}}">Messages</a>
                </div>
                <hr>


        </div>
    </div>
