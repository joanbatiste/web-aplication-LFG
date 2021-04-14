<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function players () {
        
        return $this->hasMany('App\Models\Player','idplayer');
            
    }
    public function games () {
        
        return $this->belongsTo('App\Models\Game','idgame');
            
    }
}
