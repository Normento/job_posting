<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'pays' => 'required',
            'date_naissance'=> 'required',
            'status'=> 'required',
            'activite'=>'required',
            'sexe'=>'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'addresse_ip',
        ]);
            
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'pays'=> $request->pays,
            'date_naissance'=> $request->date_naissance,
            'status' => $request->status,
            'activite' => $request->activite,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
            'addresse_ip' => $request->ip(),
        ]);

        event(new Registered($user));

        Auth::login($user);
        if($request->status == "Recruteur"){
            return redirect()->route('entreprise.create');
        }
        if($request->status == "Chercheur d'emploie"){
            return redirect()->route('chercheur.create');
        }
        //return redirect(RouteServiceProvider::HOME);
    }
}
