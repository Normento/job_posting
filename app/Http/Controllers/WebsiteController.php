<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Emploie;
use App\Models\Entreprise;
use App\Models\Postuler;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function acceuill(){
        $jobs = Emploie::orderBy('created_at','desc')->take(3)->get();

        return view('website.index',compact('jobs'));
    }
    public function job(){
        $jobs = Emploie::orderBy('id','desc')->paginate(9);
        return view('website.job',compact('jobs'));
    }

    public function about(){

        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }

    public function showjob(Emploie $job){

        return view('website.showjob',compact('job'));
    }

    public function apply(Emploie $job){
            $cv_jobs = Chercheur::where('user_id', Auth::user()->id)->get();

        return view('website.apply',compact('cv_jobs','job'));
    }

    public function profil(){
        if (Auth::user()->status == "Recruteur") {
            $profils = Entreprise::where('user_id',Auth::user()->id)->get();
        //dd($profils);
        }
        if (Auth::user()->status == "Chercheur d'emploie") {
            $profils = Chercheur::where('user_id',Auth::user()->id)->get();
       // dd($profils);
        }

        $ratings = Rating::where('examiner',Auth::user()->id)->sum('rate');
        $count = Rating::where('examiner',Auth::user()->id)->count();
        return view('website.profil',compact('profils','ratings','count'));
    }

    public function postuler(Request $request){
        $this->validate($request,[
            
            'lettre'=>'required',
        ]);

        $postuler = new Postuler();
        $postuler->user_id = Auth::user()->id;
        $postuler->emploie_id = $request->emploie_id;
        if($request->file('cv')){
            if ($request->cv) {
                $file = $request->file('cv');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $request->cv->move('storage/postuler/', $filename);
                $postuler->cv = '/storage/postuler/'.$filename;
            }
        }else{
            $postuler->cv = $request->cv;
        }

        $postuler->lettre =$request->lettre;

        $postuler->save();

        return redirect()->route('website.job')
                        ->with('success', 'Vous avez postuler avec succès à cet offre');
    }

    public function mission(){
        $poste_emploies = Emploie::Join('postulers','emploies.id','=','postulers.emploie_id')
            ->select('emploies.title','emploies.photo','emploies.responsabilities',
            'emploies.salary','emploies.dure','postulers.user_id','postulers.status','postulers.created_at')
            ->where('postulers.user_id','=',Auth::user()->id)
            ->orderBy('postulers.created_at','desc')->paginate(8);
            // dd($poste_emploies);
        $count = Emploie::Join('postulers','emploies.id','=','postulers.emploie_id')
            ->select('emploies.title','emploies.photo','emploies.responsabilities',
            'emploies.salary','emploies.dure','postulers.user_id','postulers.status','postulers.created_at')
            ->where('postulers.user_id','=',Auth::user()->id)
            ->orderBy('postulers.created_at','desc')->count();
            // dd($poste_emploies);
        return view('chercheur.index',compact('poste_emploies','count'));
    }

    public function search(Request $request){

        $q = $request->input('q');
        $jobs = Emploie::where('title','like', '%' . $q .'%')
        ->orwhere('secteur','like', '%' . $q .'%')->paginate(10);
        //dd($jobs);

        return view('website.search',compact('jobs','q'));
    }

    public function invalide(){

        return view('website.invalide');
    }

}
