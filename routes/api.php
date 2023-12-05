<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'user'],function(){
    Route::post('/',[UserController::class,'store']);

    Route::group(['prefix' => 'ballance'],function(){
        Route::patch('/credit/{user_id}',[UserController::class,'credit_ballance']);
        Route::patch('/debit/{user_id}',[UserController::class,'debit_ballance']);
    });
});