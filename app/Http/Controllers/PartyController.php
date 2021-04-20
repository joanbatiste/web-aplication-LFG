<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Database\QueryException;
use Facade\Ignition\QueryRecorder\Query;

class PartyController extends Controller
{
    //Crear una partida
    public function createParty(Request $request){

        $name = $request->input('name');
        $idplayer = $request->input('idplayer');
        $idgame = $request->input('idgame');

        try{
            return Party::create([
                'name' => $name,
                'idplayer'=> $idplayer,
                'idgame'=> $idgame

            ]);

        }catch(QueryException $error){
            $eCode = $error->errorInfo[1];
            if($eCode == 1062){
                return response()->json([
                    'error'=> "La partida que intentas crear ya existe"
                ]);
            }
        }

    }
}
