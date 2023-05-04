<?php

use App\Http\Controllers\CompagniesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\FishingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/fishings', [FishingController::class, 'index'])
        ->name('fishing.index');

    Route::get('/companies', [CompaniesController::class, 'index'])
        ->name('companies.index');

    Route::post('/companies/{id}', [CompaniesController::class, 'action'])
        ->name('companies.action');
});


require __DIR__.'/auth.php';
