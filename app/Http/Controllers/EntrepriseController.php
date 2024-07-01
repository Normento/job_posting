<?php

namespace App\Http\Controllers;

use App\Models\Emploie;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Emploie::where('user_id', Auth::user()->id)
                            ->orderBy('created_at','desc')
                        ->paginate(6);
       // dd($entreprises);
        return view('entreprise.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' =>'unique:entreprises',
            'company'=>'required|unique:entreprises',
            'logo' => 'required|mimes:png,jpg,jpeg',
            'phone' => 'required',
            'email' => 'required',
            'localisation' => 'required',
            'site_web' => 'required',
            'description' => 'required',


        ]);

            $user = new Entreprise();
            $entreprise = Auth::user()->id;
            $user->user_id =  $entreprise;
            $user->company = $request->company;
            if ($request->logo) {
                $file = $request->file('logo');
                $filename=time(). '.' .$file->getClientOriginalExtension();
                $request->logo->move('storage/entreprise/', $filename);
                $user->logo = '/storage/entreprise/'.$filename;
            }
            //$user->logo = $request->logo;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->localisation= $request->localisation;
            $user->site_web= $request->site_web;
            $user->description= $request->description;

            $user->save();

        //event(new Registered($user));

            return redirect()->route('entreprise.index')->with('success', 'Nouveau Utilisateur ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('entreprise.show',compact('entreprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
