<?php

namespace App\Exports;

use App\Models\Postuler;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostulerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       /*  $postulers = User::all();
        foreach($postulers as $postuler) */
       /*  $id = request()->get('id');
        $title = request()->get('title');
        dd($id, $title);
        return Postuler::select('user_id','cv','lettre','status')->get(); */
        /* $id = request()->get('id');
        $title = request()->get('title');
        /* $export = Postuler::select('user_id','cv','lettre','status')->get();
        $exportExcel = $export->where('emploie_id', '=', $id);
        dd($exportExcel); 
        return User::leftjoin('emploies','users.id','=','emploies.user_id')
                         ->join('postulers','users.id','=','postulers.user_id')
                        ->select('users.name','users.id','users.activite','users.pays','users.email','emploies.user_id','emploies.title','emploies.photo','emploies.responsabilities',
                         'emploies.salary','emploies.dure','postulers.emploie_id','postulers.user_id','postulers.status','postulers.created_at','postulers.cv','postulers.lettre','postulers.id AS num','lettre')
                         ->where('postulers.emploie_id','=',$id)
                        ->orderBy('created_at', 'desc')->get();
                       // dd($confirmes); */

    }

    public function headings(): array {
        return ["Nom", "Prefession", "Nationnalié","Lettre de motivation","Status","Cv"];
    }
}
