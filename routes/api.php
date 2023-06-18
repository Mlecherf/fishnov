<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FishingController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;

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


Route::get('/login', [AuthController::class, 'formLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    /*
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    */

    Route::post('/user/update', [UserController::class, 'update_user'])->name('user.update');

    Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates']);
});


