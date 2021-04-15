<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['username','password','email'];

    public function parties () {
        
        return $this->belongsTo('App\Models\Party','idplayer');
            
    }
    
}
