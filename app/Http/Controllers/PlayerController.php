<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    //Función encargada de registrar un nuevo usuario
    public function registerPlayer(Request $request)
    {

        //username, password, email
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');

        //hasheo del password
        $password = Hash::make($password);

        try {
            return Player::create([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
        } catch (QueryException $error) {
            $eCode = $error->errorInfo[1];

            if ($eCode == 1062) {
                return response()->json([
                    'error' => "Usuario ya registrado"
                ]);
            }
        }
    }
    //Funcion para el logueo de usuarios
    public function loginPlayer(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        try {
            $validate_player = Player::select('password')
                ->where('username', 'LIKE', $username)
                ->first();

            if (!$validate_player) {
                return response()->json([
                    'error' => 'Username o password inválido'
                ]);
            }

            $hashed = $validate_player->password;

            //Comprobamos que el password corresponde con el username

            if (Hash::check($password, $hashed)) {

                //Si se corresponde generamos el token
                $length = 50;
                $token = bin2hex(random_bytes($length));

                //Guardamos el token en su campo correspondiente, esto es opcional si guardamos el token en la base de datos
                Player::where('username', $username)
                    ->update(['api_token' => $token]);

                //devolvemos la informacion del player logueado
                return Player::where('username', 'LIKE', $username)
                    ->get();
            } else {
                return response()->json([
                    'error' => 'Username o password incorrecto'
                ]);
            }
        } catch (QueryException $error) {
            return response()->$error;
        }
    }
    //Funcion para actualizar datos de usuario
    public function updatePlayer(Request $request, $id)
    {
        $player = $request->user();

        if ($player['id'] != $id) {
            return response()->json([
                'error' => "No estas autorizado a  modificar estos datos."
            ]);
        }

        try {
            $username = $request->input('username');
            $password = $request->input('password');
            $email = $request->input('email');
            
            $password = Hash::make($password);

            return Player::find($id)->update([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
        } catch (QueryException $error) {
            return $error;
        }
        
    }

    //Funcion para desloguearse un usuario
    public function logoutPlayer(Request $request)
    {

        $id = $request->input('id');

        try {

            return Player::where('id', '=', $id)
                ->update(['api_token' => '']);
        } catch (QueryException $error) {
            return $error;
        }
    }
}
