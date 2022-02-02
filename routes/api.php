<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/blogs",[BlogsController::class,"index"]);
Route::post("/blogs",[BlogsController::class,"store"]);
Route::get("/blogs/{id}",[BlogsController::class,"show"]);
Route::put("/blogs/{blog}",[BlogsController::class,"update"]);
Route::delete("/blogs/{id}",[BlogsController::class,"destroy"]);