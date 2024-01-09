<?php

use App\Http\Controllers\Api\BookmarkController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserFollowingController;
use App\Http\Controllers\Api\AuthenticationController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){

});
Route::apiResource('users', UserController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('ingredients', IngredientController::class);
Route::apiResource('bookmarks', BookmarkController::class);

Route::get('/postFrom/{id}', [PostController::class, 'getAllFromUserWithId']);


// Route::post('/login',[AuthenticationController::class,'login']);
// Route::post('/logout',[AuthenticationController::class,'logout'])->Middleware(['auth:sanctum']);
// Route::post('/me',[AuthenticationController::class,'me'])->Middleware(['auth:sanctum']);

