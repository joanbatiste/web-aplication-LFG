<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Party;

class MembershipController extends Controller
{
    //
    public function getPartyPlayers(Request $request, $id)
    {
        $player = $request->user();

        if($player['id'] != $id){
            return response()->json([
                'error' => "No puedes ver el dato de otros usuarios"
            ]);
        }
        try {
            $membership = Membership::where('idplayer', $id)
                ->join('parties', 'parties.id', 'memberships.idparty')
                ->join('games', 'games.id', 'parties.idgame')->get();
            $ownership = $player->parties()->join('games', 'games.id', 'parties.idgame')->get();
            return [...$membership,...$ownership];
        }catch(QueryException $error){
            return $error;
        }
    }

    public function getPlayersParty(Request $request, $id)
    {
        try{
            $membership = Membership::where('idparty', $id)
                ->join('players', 'players.id', '=', 'memberships.idplayer')
                ->select(['username'])->get();
            $ownership = Party::find($id)->player()->select(['username'])->get();
            return [...$membership,...$ownership]; 
        }catch(QueryException $error){
            return $error;
        }
    }

    public function createPlayerParty(Request $request, $idplayer, $idparty)
    {
        $player = $request->user();

        if($player['id'] != $idplayer){
            return response()->json([
                'error' => "No estas autorizado a crear un nuevo membership"
            ]);
        }
        try{
            return response()->json(
                Membership::create([
                    "idplayer" => $idplayer,
                    "idparty" => $idparty,
                ])
                );
        }catch(QueryException $error){
            return $error;
        }
    }

    public function createPartyPlayer(Request $request, $idparty, $idplayer)
    {
        return $this->createPlayerParty($request, $idplayer, $idparty);
    }

    public function deletePlayerParty(Request $request, $idplayer, $idparty)
    {
        $player = $request->user();
        if($player['id'] != $idplayer){
            return response()->json([
                'error' => "No autorizado a realizar esta acción"
            ]);
        }
        try{
            return Membership::where('idplayer', $idplayer)
                ->where('idparty', $idparty)
                ->delete();
        }catch(QueryException $error){
            return $error;
        }
    }
    public function deletePartyPlayer(Request $request, $idparty, $idplayer)
    {
        return $this->delete($request, $idplayer, $idparty);
    }
}
