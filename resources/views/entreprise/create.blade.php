<!DOCTYPE html>
        <html lang="en">
        <title>{{Auth::user()->name}}</title>
@include('partial.header')
        <body>
                <div class="info">
                        <div>
                                <h2>Bienvenu {{Auth::user()->name}}</h2>
                        </div>
                        <div class="info2">
                                <p>Veuillez donner plus d'information sur votre entreprise <br> pour nous permettre de mieux la connaitre</p>
                        </div>
                </div>
                <div class="formulaire">

                        <form action="{{route('entreprise.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Le nom de votre entreprise</label>
                                        <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Le logo de l'entreprise</label>
                                        <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Téléphone</label>
                                        <input type="tel" name="phone" class="form-control" id="exampleInputPassword1" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputPassword1" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Localisation</label>
                                        <input type="text" name="localisation" class="form-control" id="exampleInputPassword1" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Site web</label>
                                        <input type="url" name="site_web" class="form-control" id="exampleInputPassword1" >
                                </div>
                                <div class="form-outline mb-4" style="margin-bottom:10px;">
                                        <label class="form-label" for="form6Example7">Description de l'entreprise</label>
                                        <textarea name="description" class="form-control" id="form6Example7" rows="4"></textarea>
                                </div><br>
                                <div>
                                    <button type="submit" class="btn btn-primary" name="entreprise">Enrégistrer</button>
                                </div>


                        </form>
                </div>
        </body>

        </html>

<style>
        body{
                margin-top: 20px;
                padding: 25px;
        }
        .formulaire {
                display: flex;
                align-items: center;
                justify-content: center;

        }

        input {
                width: 600px;
        }
        .info{
                text-align: center;
        }
</style>
