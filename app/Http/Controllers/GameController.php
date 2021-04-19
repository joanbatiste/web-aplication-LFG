<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Database\QueryException;

class GameController extends Controller
{
    //Función encargada de registrar un nuevo juego
    public function registerGame(Request $request){

        //username, password, email
        $title = $request->input('title');
        $thumbnail_url = $request->input('thumbnail_url');
        $url = $request->input('url');


        try{
            return Game::create([
                'title' => $title,
                'thumbnail_url' => $thumbnail_url,
                'url' => $url
            ]);
        } catch (QueryExeption $error){
            $eCode = $error->errorInfo[1];

            if($eCode == 1062){
                return response()->json([
                    'error'=> "Juego ya registrado"
                ]);
            }
        }

    }
}
