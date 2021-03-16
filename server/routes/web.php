<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, MainController};
use App\Http\Controllers\Admin\PollController;
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

Route::get('/', function () {
    return view('layouts.base',["hide_nav" => true]);
});

Route::get("home", [MainController::class, "home"])->name('home');

Route::get("user-polls", [MainController::class, "userPolls"])->middleware(["auth","cekRole:user"]);
Route::get("user-polls/{poll}", [MainController::class, "takePoll"])->name("user-polls.take")->middleware(["auth","cekRole:user"]);
Route::post("user-polls/{poll}", [MainController::class, "submitPoll"])->name("user-polls.submit")->middleware(["auth","cekRole:user"]);


Route::resource("manage-polls", PollController::class)->middleware(["auth","cekRole:admin"]);

Route::get("login", [AuthController::class, "login"])->name('login');
Route::post("login", [AuthController::class, "actionLogin"])->name('action-login');
Route::post("logout", [AuthController::class, "logout"])->name('logout');