<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Entreprise extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'company',
        'logo',
        'phone',
        'email',
        'localisation',
        'site_web',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }

}
