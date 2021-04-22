<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'idplayer',
        'idparty'
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\Player', 'idplayer', 'id');
    }

    public function party()
    {
        return $this->belongsTo('App\Models\Party', 'idparty', 'id');
    }
}
