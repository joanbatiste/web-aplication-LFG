<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Membership;
use App\Models\Party;

class MessageController extends Controller
{
    //Creo los mensajes
    public function createMessage(Request $request)
    {
        $message = $request->input('message');
        $idplayer = $request->input('idplayer');
        $idparty = $request->input('idparty');

        try {
            return Message::create([
                'message' => $message,
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
        } catch (QueryException $error) {
            $eCode = $error->errorInfo[1];

            if ($eCode == 1062) {
                return response()->json([
                    'eror' => 'El mensaje no se ha podido crear'
                ]);
            };
        }
    }

    //Editar Mensaje
    public function updateMessage(Request $request, $id)
    {
        $player = $request->player();
        $message = Message->input('message');

        try {
            return Message::where('id', '=', $id)
                ->update(['message' => $message]);
        } catch (QueryException $error) {
            return $error;
        }
    }

    //Borrar Mensaje
    public function deleteMessage(Request $request, $id)
    {
        $player = $request->player();
        $message = Message::find($id);

        if (!$message) {
            return response()->json([
                'error' => "El mesaje no existe."
            ]);
        }
        if ($message['player_id'] != $player['id']) {
            return response()->json([
                'error' => "No esta autorizado."
            ]);
        }

        try {
            return Message::destroy([
                'id' => $id,
            ]);
        } catch (QueryException $error) {
            $eCode = $error->errorInfo[1];
            if ($eCode == 1062) {
                return response()->json([
                    'error' => "El mensaje no se pudo eliminar"
                ]);
            }
        }
    }

    //Traer todos los mensajes
    public function getMessageParty($id)
    {
        try {
            return Message::all()->where('idparty', '=', $id);
        } catch (QueryException $error) {
            return $error;
        }
    }
}
