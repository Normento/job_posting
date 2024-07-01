<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chercheur extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'photo',
        'cv',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }

}
