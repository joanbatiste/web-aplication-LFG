<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MembershipController;

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
Route::post('/players/register',[PlayerController::class, 'registerPlayer']);
Route::post('/players/login',[PlayerController::class, 'loginPlayer']);

Route::post('/game/register',[GameController::class, 'registerGame']);

Route::middleware('auth:api')->group(function(){
    //Player
    Route::post('/players/logout',[PlayerController::class, 'logoutPlayer']);
    Route::put('/players/{id}',[PlayerController::class, 'updatePlayer']);

    //Membership
    Route::post('/parties/login',[MembershipController::class, 'loginParty']);
    Route::delete('/parties/logout',[MembershipController::class, 'logoutParty']);
    // Route::get('/parties/{id}/players',[MembershipController::class, 'getPartyPlayers']);
    // Route::get('/players/{id}/parties',[MembershipController::class, 'getPlayersParties']);
    // Route::put('/players/{idplayer}/parties/{idparty}', [MembershipController::class, 'createPlayerParty']);
    // Route::put('/parties/{idparty}/players/{idplayer}', [MembershipController::class, 'createPartyPlayer']);
    // Route::delete('/players/{idplayer}/parties/{idparty}', [MembershipController::class, 'deletePlayerParty']);
    // Route::delete('/parties/{idparty}/players/{idplayer}', [MembershipController::class, 'deletePartiesPlayers']);
    
    //Parties
    Route::post('/games/{idgame}/parties',[PartyController::class, 'createParty']);
    Route::get('/games/{id}/parties',[PartyController::class, 'findPartyByGame']);
    Route::delete('/parties/{id}',[PartyController::class, 'deleteParty']);

    //Games

    //Message
    Route::post('/parties/{id}/messages',[MessageController::class, 'createMessage']);
    Route::get('/parties/{id}/messages',[MessageController::class, 'getMessage']);
    Route::put('/messages/{id}',[MessageController::class, 'updateMessage']);
    Route::delete('/messages/{id}',[MessageController::class, 'deleteMessage']);
});
