<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware'=> ['cors']], function (){

       

// });
//Rutas Contrtoladoras de Players
Route::post('/player/register',[PlayerController::class, 'registerPlayer']);
Route::post('/player/login',[PlayerController::class, 'loginPlayer']);

Route::group(['middleware' => 'auth:api', function(){
    //Player
    Route::get('/player/logout',[PlayerController::class, 'logoutPlayer']);
    Route::put('/players/{id}',[PlayerController::class, 'updatePlayer']);

    //Membership
    Route::post('/players/{id}/parties',[MembershipController::class, 'getPartiesPlayer']);
    Route::post('/parties/{id}/players',[MembershipController::class, 'getPlayersParties']);
    Route::put('players/{player_id}/parties/{party_id}', [MembershipController::class, 'updatePlayerParty']);
    Route::put('parties/{party_id}/players/{player_id}', [MembershipController::class, 'updatePartiePlayer']);
    Route::delete('players/{player_id}/parties/{party_id}', [MembershipController::class, 'deletePlayerParty']);
    Route::delete('parties/{party_id}/players/{player_id}', [MembershipController::class, 'deletePartiesPlayers']);
    
    //Parties

    Route::post('/games/{id}/parties',[PartyController::class, 'createParty']);
    Route::get('/games/{id}/parties',[PartyController::class, 'findParty']);
    Route::get('/parties/{id}',[PartyController::class, 'deleteParty']);

    //Games

    //Message
    Route::get('/parties/{id}/messages',[MessageController::class, 'getMessageParty']);
    Route::post('/parties/{id}/messages',[MessageController::class, 'createMessageParty']);
    Route::put('/messages/{id}',[MessageController::class, 'updateMessage']);
    Route::delete('/messages/{id}',[MessageController::class, 'deleteMessage']);
}]);