<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Entreprise;
use App\Models\Chercheur;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'pays',
        'date_naissance',
        'status',
        'activite',
        'sexe',
        'addresse_ip',
        'password',
        'oauth_id',
        'oauth_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];


    public function chercheur(){
        return $this->hasOne(Chercheur::class);

    }
    public function emploie(){
        return $this->belongsTo(Emploie::class);
    }

    public function conversations(){
        return Conversation::where(function($q){
            return $q->where('to', $this->id)
            ->orWhere('from',$this->id);
        });
    }

    public function getConversationAttribute(){
        return $this->conversations()->get();
    }

    public function ratings(){
        return $this->hasMany(Rating::class,'examiner');
    }

    public function postulers(){
        return $this->hasMany(Postuler::class);
    }

    public function entreprise(){
        return $this->hasOne(Entreprise::class);
    }
}
