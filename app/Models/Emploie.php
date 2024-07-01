<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploie extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'title',
        'photo',
        'secteur',
        'responsabilities',
        'qualification',
        'description',
        'salary',
        'dure'
];

public function users(){
    return $this->hasMany(User::class);

}
}

