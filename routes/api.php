<?php

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
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

/// Passport Authentication Routes...
Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [LoginController::class, 'userInfo']);
    Route::get('products', [LoginController::class, 'products']);
    Route::get('eloquentRelation', [LoginController::class, 'eloquentRelation']);
});
