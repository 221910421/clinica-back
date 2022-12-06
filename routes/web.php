<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\apiController;


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

// Route::get('/', [MedicamentosController::class, 'getMedicinas']);

// Route::get('/', [MedicamentosController::class, 'getMedicamentos']);

Route::resource('medicamentos', apiController::class);

Route::get('/create', [apiController::class, 'create']);
Route::get('/store', [apiController::class, 'store']);
Route::get('/show/{id}', [apiController::class, 'show']);
Route::put('/edit/{id}', [apiController::class, 'edit']);
Route::delete('/destroy/{id}', [apiController::class, 'destroy']);
