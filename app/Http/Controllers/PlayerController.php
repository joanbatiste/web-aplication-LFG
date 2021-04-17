<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\QueryException;


use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    //Función encargada de registrar un nuevo usuario
    public function registerPlayer(Request $request){

        //username, password, email
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');

        //hasheo del password
        $password = Hash::make($password);

        try{
            return Player::create([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
        } catch (QueryExeption $error){
            $eCode = $error->errorInfo[1];

            if($eCode == 1062){
                return response()->json([
                    'error'=> "Usuario ya registrado"
                ]);
            }
        }

    }

}
