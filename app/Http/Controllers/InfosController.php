<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'pays' => 'required',
            'date_naissance'=> 'required',
            'status'=> 'required',
            'activite'=>'required',
            'sexe'=>' required',
            'addresse_ip'
        ]);

        $user->update($request->all());
        if($request->status == "Recruteur"){
            return redirect()->route('entreprise.create');
        }
        if($request->status == "Chercheur d'emploie"){
            return redirect()->route('chercheur.create');
        }
        // return redirect()->route('association.index')
        //             ->with('success','Modifications éffectuées avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
