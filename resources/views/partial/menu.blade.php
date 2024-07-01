 <!-- PRE LOADER -->
 <section class="preloader">
     <div class="spinner">
         <span class="spinner-rotate"></span>
     </div>
 </section>


 <!-- MENU -->
 <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">

         <div class="navbar-header">
             <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                 <span class="icon icon-bar"></span>
                 <span class="icon icon-bar"></span>
                 <span class="icon icon-bar"></span>
             </button>

             <!-- lOGO TEXT HERE -->
             <a href="#" class="navbar-brand">Job Search</a>
         </div>


         <!-- MENU LINKS -->
         <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav navbar-nav-first">
                 <li class="{{request()->is('/')  ? 'active' : '' }}"><a href="/">Home</a></li>
                 <li class="{{request()->is('website/job')  ? 'active' : '' }}"><a href="{{ route('website.job')}}">Jobs</a></li>
                 <li class="{{request()->is('website/about')  ? 'active' : '' }}"><a href="{{ route('website.about')}}">About Us</a></li>
                 <li class="{{request()->is('website/contact')  ? 'active' : '' }}"><a href="{{ route('website.contact')}}">Contact Us</a></li>
                 @auth


                 <li class="dropdown">
                     <button href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></button>

                     <ul class="dropdown-menu">
                         @if (Auth::user()->status == "Recruteur")
                         <li><a href="{{ route('entreprise.index')}}">Mon espace</a></li>
                         @elseif (Auth::user()->status == "Chercheur d'emploie")
                         <li><a href="{{ route('chercheur.index')}}">Mon espace</a></li>
                         @else
                         compte invalide
                         @endif
                         <li>
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                         <li> <a :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 Déconnexion
                             </a></li>
                         </form>
                 </li>
             </ul>
             </li>
             @else
             <li class="{{request()->is('register')  ? 'active' : '' }}"><a href="{{ route('register')}}">Connectez-vous</a></li>
             @endauth


             </ul>
             <div class="form-search">
                 <form action="{{ route('search')}}" method="POST" class="">
                     @csrf
                     <input type="search" name="q" id="">
                     <button class="btn-search" type="submit">Recherche</button>
                 </form>
             </div>
         </div>
     </div>

     <!-- message de succes -->
     @if ($message = Session::get('success'))
     <div>
         <p>
             <script>
                 swal("Bravo!", "{{ $message }}", "success");
             </script>
         </p>
     </div>
     @endif

     <!-- message d'erreur -->
     @if ($errors->any())
     <div>
         <script>
             swal({
                 title: "Echec",
                 text: "Il y a une erreur.",
                 icon: "warning",
                 // buttons: true,
                 dangerMode: true,
             })
         </script>
     </div>
     @endif
 </section>

 <style>
     input {
         border-radius: 10px;
         border: 1px solid #29ca8e;
     }

     input:focus {
         outline: none;
     }

     .btn-search {
         padding: 5px 5px;
         border-radius: 10px;
         border: none;
         background-color: #29ca8e;
         color: white;
     }

     button {
         margin-top: 25px;
         border: none;
         background-color: white;
     }
 </style>
