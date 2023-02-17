<?php

use App\Http\Controllers\api\InterestController;
use App\Http\Controllers\AuthController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/interests', [InterestController::class, 'index'])->middleware('auth:api');
Route::get('/storeinterest', [InterestController::class, 'store'])->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/posts', [PostController::class, 'index']);
//     Route::get('/posts/{id}', [PostController::class, 'show']);
//     Route::post('/posts', [PostController::class, 'store']);
//     Route::put('/posts/{id}', [PostController::class, 'update']);
//     Route::delete('/posts/{id}', [PostController::class, 'destroy']);
// });
