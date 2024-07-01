@include('partial.header')
<section>
          <div class="container">
               <div class="text-center">
                    <h1>{{Auth::user()->name}}</h1>

                    <br>

                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
                    <a class="btn btn-warning" href="{{route('user.edit',Auth::user()->id)}}">Je continue</a>
               </div>
          </div>
     </section>
