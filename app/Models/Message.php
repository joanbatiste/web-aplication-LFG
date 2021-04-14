<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'creationDate'];

    public function players () {
        
        return $this->belongsTo('App\Models\Player','idplayer');
            
    }
    public function parties () {
        
        return $this->belongsTo('App\Models\Party','idparty');
            
    }
}
