<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable =[ 'from', 'to','emploie_id'];

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function emploie(){
        return $this->belongsTo('App\Models\Emploie');
    }
}
