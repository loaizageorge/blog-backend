<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


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

Route::prefix( 'auth')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getCurrentUser'])->middleware('auth:sanctum');
});

Route::post('/user', [UserController::class, 'store']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('user/logout', [UserController::class, 'logout']);
Route::get('/user/check', [UserController::class, 'check']);

// API only, the SPA front end will take care of the views
Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
