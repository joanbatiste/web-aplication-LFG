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

    public function loginPlayer(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        try{
            $validate_player = Player::select('password')
            ->where('username', 'LIKE', $username)
            ->first();

            if(!$validate_player){
                return response()->json([
                    'error'=> 'Username o password inválido'
                ]);
            }

            $hashed = $validate_player-> password;

            //Comprobamos que el password corresponde con el username

            if(Hash::check($password, $hashed)){

                //Si se corresponde generamos el token
                $length = 50;
                $token = bin2hex(random_bytes($length));

                //Guardamos el token en su campo correspondiente, esto es opcional si guardamos el token en la base de datos
                Player::where('username', $username)
                ->update(['token'=>$token]);

                //devolvemos la informacion del player logueado
                return Player::where('username', 'LIKE', $username)
                ->get();
            }else{
                return reponse()->json([
                    'error'=>'Username o password incorrecto'
                ]);
            }

        }catch (QueryException $error){
            return response()->$error;
        }
    }

}
