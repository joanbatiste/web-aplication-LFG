<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
// use App\Models\Party;

class MembershipController extends Controller
{
    //
    public function loginParty(Request $request){

        $idplayer = $request->input('idplayer');
        $idparty = $request->input('idparty');

        try {

            return Membership::create([
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
    
        } catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];
    
            if($eCode == 1062) {
                return response()->json([
                    'error' => "No te has podido unir a la party"
                ]);
            }
    
        }
    }

    public function logoutParty(Request $request){

        $idplayer = $request->input('idplayer');
        $idparty = $request->input('idparty');

        try {

            return Membership::destroy([
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
    
        } catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];
    
            if($eCode == 1062) {
                return response()->json([
                    'error' => "No has podido irte de la party"
                ]);
            }
    
        }
    }    
    
};