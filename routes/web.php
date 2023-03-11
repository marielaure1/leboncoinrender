<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnoncesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AnnoncesController::class, 'all']);
Route::get('/create', [AnnoncesController::class, 'formCreate']);
Route::post('/create', [AnnoncesController::class, 'create']);
Route::get('/show/{id}', [AnnoncesController::class, 'show']);
Route::get('/vendeur/{id}', [AnnoncesController::class, 'vendeur']);
Route::get('/validate/{tokenRandom}', [AnnoncesController::class, 'validateAnnonce']);
Route::get('/delete/{tokenRandom}', [AnnoncesController::class, 'delete']);
Route::fallback(function() {
    return view('error');
 });
