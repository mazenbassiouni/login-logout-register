<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\authentication\LoginController;
use App\Http\Controllers\api\authentication\LogoutController;
use App\Http\Controllers\api\authentication\RegisterController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return Auth::user();
});


Route::post('/login',[LoginController::class, 'login']);
Route::post('/register',[RegisterController::class, 'create']);
Route::get('/logout',[LogoutController::class, 'logout'])->middleware('auth:api');