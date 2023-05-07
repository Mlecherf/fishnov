<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FishingController;


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



#Route::middleware('auth:sanctum')->get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates']);
});

#Route::middleware('auth:sanctum')->get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates'])->name('fishings.date');

#Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates'])
#        ->name('fishings.date')->middleware('auth');

#Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates'])->name('fishings.date');

#Route::group(['middleware' => ['api']], function () {
#    Route::middleware('auth:sanctum')->get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates'])->name('fishings.date');
#});

#Route::middleware('auth:sanctum')->group(function () {
#    Route::get('/fishings/dates', [FishingController::class, 'get_all_fishing_dates'])->name('fishings.date');
#});

