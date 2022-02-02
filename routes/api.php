<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AuthController;


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

Route::group( ["middleware" => ["auth:sanctum"]], function(){
    Route::post("/logout",[AuthController::class,"logout"]);
    Route::post("/blogs",[BlogsController::class,"store"]);
    Route::put("/blogs/{blog}",[BlogsController::class,"update"]);
    Route::delete("/blogs/{id}",[BlogsController::class,"destroy"]);
});

Route::post("/register",[AuthController::class,"signup"]);
Route::post("/login",[AuthController::class,"signin"]);
Route::get("/blogs",[BlogsController::class,"index"]);
Route::get("/blogs/{id}",[BlogsController::class,"show"]);
