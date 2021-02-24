<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth/create',[DataController::class,'store']);

Route::post('/auth/create_user',[AuthController::class,'create_user']);

Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/logout',[AuthController::class,'logout']);
Route::post('/auth/refresh',[AuthController::class,'refresh']);
Route::post('/auth/reset/{id}',[AuthController::class,'reset']);

//poll.
Route::post('/user_create',[PollController::class,'create_user']);
Route::post('/poll',[PollController::class,'login']);
Route::post('/create_poll',[PollController::class,'create_vote']);
Route::get('/poll/{poll_id}',[PollController::class,'getpoll']);
Route::post('/poll/{poll_id}/vote/{choice_id}',[PollController::class,'vote']);