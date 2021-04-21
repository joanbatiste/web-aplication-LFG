<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Party;

class MembershipController extends Controller
{
    //
    public function getPartiesPlayer(Request $request, $id)
    {
        $player = $request->player();

        if($player['id'] != $id){
            return response()->json([
                'error' => "No puedes ver el dato de otros usuarios"
            ]);
        }
        try {
            $membership = Membership::where('player_id', $id)
                ->join('parties', 'parties.id', 'memberships.party_id')
                ->join('games', 'games.id', 'parties.game_id')->get();
            $ownership = $player->parties()->join('games', 'games.id', 'parties.game_id')->get();
            return [...$membership,...$ownership];
        }catch(QueryException $error){
            return $error;
        }
    }

    public function getPlayersParty(Request $request, $id)
    {
        try{
            $membership = Membership::where('party_id', $id)
                ->join('players', 'players.id', '=', 'memberships.player_id')
                ->select(['username'])->get();
            $ownership = Party::find($id)->player()->select(['username'])->get();
            return [...$membership,...$ownership]; 
        }catch(QueryException $error){
            return $error;
        }
    }

    public function createPlayerParty(Request $request, $player_id, $party_id)
    {
        $player = $request->player();

        if($player['id'] != $player_id){
            return response()->json([
                'error' => "No estas autorizado a crear un nuevo membership"
            ]);
        }
        try{
            return response()->json(
                Membership::create([
                    "player_id" => $player_id,
                    "party_id" => $party_id,
                ])
                );
        }catch(QueryException $error){
            return $error;
        }
    }

    public function createPartyPlayer(Request $request, $party_id, $player_id)
    {
        return $this->createPlayerParty($request, $player_id, $party_id);
    }

    public function deletePlayerParty(Request $request, $player_id, $party_id)
    {
        $player = $request->player();
        if($player['id'] != $player_id){
            return response()->json([
                'error' => "No autorizado a realizar esta acción"
            ]);
        }
        try{
            return Membership::where('player_id', $player_id)
                ->where('party_id', $party_id)
                ->delete();
        }catch(QueryException $error){
            return $error;
        }
    }
    public function deletePartyPlayer(Request $request, $party_id, $player_id)
    {
        return $this->delete($request, $player_id, $party_id);
    }
}
