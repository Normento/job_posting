<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'rate' => 'required'
        ]);
        /* $note = new Rating();

        $note->examiner = $request->id;
        $note->rate = $request->rate;
        $note->examinateur = Auth::user()->id;

        $note->save(); */
         Rating::create([
            'examiner' => $request->id,
            'rate' => $request->rate,
            'examinateur' => Auth::user()->id
        ]);

        return back()->with('success','Merci');
    }


}
