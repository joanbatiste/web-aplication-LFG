<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PartyController;


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

Route::post('/game/register',[GameController::class, 'registerGame']);

//Rutas controladoras de Parties
Route::post('/party',[PartyController::class, 'createParty']);