<?php

use App\Http\Controllers\FishingController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    # FISHINGS 
    Route::get('/fishings', [FishingController::class, 'index'])->name('fishing.index');


    # COMPANY
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

    #Route::post('/company/{id}', [CompanyController::class, 'action']);
    
    # création company
    Route::get('/company/create', [CompanyController::class, 'get_create_company'])->name('company.create.get');
    Route::post('/company/create', [CompanyController::class, 'post_create_company'])->name('company.create.post');

    # rejoindre une company
    Route::get('/company/join', [CompanyController::class, 'get_join_company'])->name('company.join.get');
    Route::post('/company/join', [CompanyController::class, 'post_join_company'])->name('company.join.post');


});



require __DIR__.'/auth.php';
