<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route User Start
Route::post('/input-user',[UserController::class,'store']);
Route::get('/data-user',[UserController::class,'show']);
Route::get('/user/{id}',[UserController::class,'detail']);
Route::put('/user/{id}', [UserController::class,'update']);
Route::delete('/user/{id}',[UserController::class,'delete']);
//Route User End

// Route Inventory Start
Route::post('input-inventory',[InventoryController::class,'store']);
Route::get('/data-inventory',[InventoryController::class,'show']);
Route::get('/inventory/{id}',[InventoryController::class,'detail']);
Route::put('/inventory/{id}', [InventoryController::class,'update']);
Route::delete('/inventory/{id}',[InventoryController::class,'delete']);
// Route Inventory End
