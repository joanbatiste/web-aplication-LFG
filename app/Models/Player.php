<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    use Notifiable;
   
    protected $fillable = [
        'username',
        'password',
        'email',
        'token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Realaciíon pertenencia de un player a una party
    public function parties () {
        
        return $this->belongsTo('App\Models\Party','idparty','id');
            
    }
    // Relación de propiedad de un player de muchos mensajes
    public function messages () {
        return $this->hasMany('App\Models\Message', 'idplayer');
    }
    
}
