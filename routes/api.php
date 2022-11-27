<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'blog' , 'middleware' => 'jwt.auth'], function () {
    Route::get('/blog', [\App\Http\Controllers\Api\BlogController::class, 'index']);
    Route::post('/blog/create', [\App\Http\Controllers\Api\BlogController::class, 'store']);
    Route::put('/blog/update/{id}', [\App\Http\Controllers\Api\BlogController::class, 'update']);
    Route::delete('/blog/delete/{id}', [\App\Http\Controllers\Api\BlogController::class, 'destroy']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
