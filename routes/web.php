<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [GuestController::class, 'index']);

Route::post('/retrieve', [GuestController::class, 'retrieve'])->name('retrieve');
Route::post('/process', [GuestController::class, 'retrieve'])->name('process');

Route::get('/{number}', [GuestController::class, 'edit']);

Route::post('/', [GuestController::class, 'confirm']);
