<?php

namespace App\Http\Controllers;

use App\Exports\PostulerExport;
use App\Mail\AccepterMail;
use App\Mail\RefuserMail;
use App\Models\Emploie;
use App\Models\Postuler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Exports\PostulersExport;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Rating;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class ConfirmeController extends Controller
{
    public function index(Request $request, User $confirme){
            $offre = Crypt::decrypt($request->get('id'));
            $title = Crypt::decrypt($request->get('title'));
           // dd($offre);
        $confirmes = User::leftjoin('emploies','users.id','=','emploies.user_id')
                         ->join('postulers','users.id','=','postulers.user_id')
                        ->select('users.name','users.id','users.activite','users.pays','users.email','emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                         'emploies.salary','emploies.dure','postulers.emploie_id','postulers.user_id','postulers.status','postulers.created_at','postulers.cv','postulers.lettre','postulers.id AS num','lettre')
                         ->where('postulers.emploie_id','=',$offre)
                        ->orderBy('created_at', 'desc')->paginate(6);

        $count = User::leftjoin('emploies','users.id','=','emploies.user_id')
                        ->join('postulers','users.id','=','postulers.user_id')
                       ->select('users.name','users.id','users.activite','users.pays','users.email','emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                        'emploies.salary','emploies.dure','postulers.emploie_id','postulers.user_id','postulers.status','postulers.created_at','postulers.cv','postulers.lettre','postulers.id AS num','lettre')
                        ->where('postulers.emploie_id','=',$offre)
                       ->orderBy('created_at', 'desc')->count();

                        $confirmes->appends(['id' => Crypt::encrypt($offre),'title'=>Crypt::encrypt($title)])->render();
        return view('confirme.confirme_offre',compact('confirmes','title','offre','count'));

    }

    public function update(Request $request, Postuler $confirme){

        $request->validate([
            'status' => 'required',
        ]);

        $confirme->update([
            'status' => $request->status,
        ]);

        $infos=[
            'id'=> $request->id,
            'title'=> $request->title,
            'name'=> $request->name,
            'email' => $request->email,
            'emploie_id'=> $request->emploie_id
        ];


        if($request->status == 'Accepter'){

            $conversation = Conversation::create([
                'from'=> Auth::user()->id,
                'to' => $infos['id'],
                'emploie_id'=>  $infos['emploie_id']
            ]);

            Message::create([
                'user_id' => Auth::user()->id,
                'conversation_id' => $conversation->id,
                'content' => 'J\'ai validé votre candidature'
            ]);
            Mail::to($infos['email'])->send(new AccepterMail($infos));
            return back()->with('success', 'Demande acceptée');
            }else{
                Mail::to($infos['email'])->send(new RefuserMail($infos));
                return back()->with('success', 'Demande rejetée');
            }
    }

    public function liredoc(Postuler $confirme){

        return view('confirme.show',compact('confirme'));
    }

    public function exportPostulerListToExcel() {

         $id = request()->get('id');
        $title = request()->get('title');

        $exportExcel = Emploie::leftjoin('users','users.id','=','emploies.user_id')
            ->join('postulers','users.id','=','postulers.user_id')
            ->select('users.name','users.activite','users.pays','users.email','emploies.title',
            'emploies.salary','emploies.dure','postulers.status','postulers.lettre','postulers.created_at')
            ->where('postulers.emploie_id','=',$id)
            ->orderBy('created_at', 'desc')->get();
       return  fastexcel($exportExcel)->download('postuler.xlsx');
    }
}
