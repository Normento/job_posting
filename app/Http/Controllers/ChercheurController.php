<?php

namespace App\Http\Controllers;

use App\Models\Chercheur;
use App\Models\Emploie;
use App\Models\Postuler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChercheurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poste_emploies = Emploie::Join('postulers','emploies.id','=','postulers.emploie_id')
                        ->select('emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                        'emploies.salary','emploies.dure','postulers.user_id','postulers.status','postulers.created_at')
                        ->where('postulers.user_id','=',Auth::user()->id)
                        ->orderBy('postulers.created_at','desc')->paginate(6);

        $count = Emploie::Join('postulers','emploies.id','=','postulers.emploie_id')
                        ->select('emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                        'emploies.salary','emploies.dure','postulers.user_id','postulers.status','postulers.created_at')
                        ->where('postulers.user_id','=',Auth::user()->id)
                        ->orderBy('postulers.created_at','desc')->count();
        return view('chercheur.index',compact('poste_emploies','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('chercheur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' =>'unique:chercheurs',
            'photo'=>'required|mimes:png,jpg,jpeg',
            'cv' => 'required|mimes:pdf',
            'description' => 'required',


        ]);

        $user = new Chercheur();
        $chercheur = Auth::user()->id;
       //dd($entreprise);
            $user->user_id =  $chercheur;
            if ($request->photo) {
                $file = $request->file('photo');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $request->photo->move('storage/chercheur/photo/', $filename);
                $user->photo = '/storage/chercheur/photo/'.$filename;
            }
            if ($request->cv) {
                $file = $request->file('cv');
               !//
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $request->cv->move('storage/chercheur/cv/', $filename);
                $user->cv = '/storage/chercheur/cv/'.$filename;
            }
            $user->description= $request->description;

        $user->save();

        //event(new Registered($user));

            return redirect()->route('chercheur.index')->with('success', 'Profile completé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chercheur  $chercheur
     * @return \Illuminate\Http\Response
     */
    public function show(Chercheur $chercheur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chercheur  $chercheur
     * @return \Illuminate\Http\Response
     */
    public function edit(Chercheur $chercheur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chercheur  $chercheur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chercheur $chercheur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chercheur  $chercheur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chercheur $chercheur)
    {
        //
    }
}
