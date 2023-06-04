<?php

use App\Http\Controllers\CompaniesController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    # FISHINGS 
    Route::get('/fishings', [FishingController::class, 'index'])->name('fishing.index');


    # COMPANY
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

    #Route::post('/company/{id}', [CompanyController::class, 'action']);

    Route::get('/company/create', [CompanyController::class, 'create_company'])->name('company.create');

    Route::post('/company/add', [CompanyController::class, 'add_company'])->name('company.add');
});



require __DIR__.'/auth.php';
