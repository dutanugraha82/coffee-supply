<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoginController;
use App\Models\Delivery;
use App\Models\Inventory;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route Register start
Route::get('/register',[LoginController::class, 'register']);
Route::post('/register-proses', [LoginController::class,'store']);
// Route Register End

// Route Login start
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login-proses', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
// Route Login End


Route::get('/', [DeliveryController::class, 'index'])->middleware('auth');
Route::get('/input-delivery', [DeliveryController::class, 'create'])->middleware('auth');
Route::post('/', [DeliveryController::class, 'store'])->middleware('auth');
Route::get('/delivery/{order_id}/edit', [DeliveryController::class, 'edit'])->middleware('auth');
Route::put('/delivery/{order_id}', [DeliveryController::class, 'update'])->middleware('auth');
Route::delete('/delivery/{order_id}', [DeliveryController::class,'delete'])->middleware('auth');

Route::get('/data-stock', function(){
    $data = Inventory::all();
    return view('data-stock', compact('data'));
});