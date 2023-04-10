<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    if(Auth::check()){
        $user = Auth::user();
        return $user;
    };
});

Route::middleware('auth')->group(function(){
    Route::get("post", [PostController::class, "create"]);
    Route::post("post", [PostController::class, "store"]);
    Route::get("posts", [PostController::class, "index"]);
    Route::get("posts/edit/{id}", [PostController::class, "show"]);
    Route::post("posts/edit/{id}", [PostController::class, "update"]);
    Route::get("posts/{id}", [PostController::class, "delete"]);
});




Route::get("register", [UserController::class, "create"]);
Route::post("register", [UserController::class, "store"]);
Route::get("login", [UserController::class, "login"])->name('login');
Route::post("login", [UserController::class, "check"]);
Route::get("logout", [UserController::class, "logout"]);
