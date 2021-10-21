<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

// App
Route::get('/patron/{patron}', [AppController::class, 'patron'])->name('patron');
Route::get('/loan/{loan}', [AppController::class, 'loan'])->name('loan');
Route::get('/institution/{institution}', [AppController::class, 'institution'])->name('institution');
Route::get('/', [AppController::class, 'index'])->where('any', '.*')->name('app');

Route::get('loans/{loan}/patron', [LoanController::class, 'patron'])->name('loans.edit.patron');
Route::get('loans/{loan}/institution', [LoanController::class, 'institution'])->name('loans.edit.institution');
Route::resource('loans', LoanController::class)->except(['index', 'show']);
Route::resource('patrons', PatronController::class)->except(['index', 'show']);
Route::resource('institutions', InstitutionController::class)->except(['index', 'show']);