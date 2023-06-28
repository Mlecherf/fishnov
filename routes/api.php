<?php

use App\Http\Controllers\API\CompanyController;
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

    Route::get('/user/{id}', [UserController::class, 'get_user'])->name('user.get');
    Route::post('/user/update/{id}', [UserController::class, 'update_user'])->name('user.update');

    Route::get('/company/{id}', [CompanyController::class, 'get_company_info'])->name('company.get');
    Route::post('/company/join', [CompanyController::class, 'join_company'])->name('company.join');

    Route::post('/fishing/add/{id}', [FishingController::class, 'add_fishing'])->name('fishing.add');

    # JSP ? 
    Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates']);
});


