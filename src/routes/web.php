<?php

use App\Http\Controllers\AppController;
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
Route::get('/{any}', [AppController::class, 'index'])->where('any', '.*')->name('app');