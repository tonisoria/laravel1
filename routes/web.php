<?php

use App\Http\Controllers\ApiController;
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

Route::get('/api/llibres', [ApiController::class, 'getLlibres']);

Route::get('/api/autors', [ApiController::class, 'getAutors']);

Route::get('/api/llibre/{id}', [ApiController::class, 'getLlibre']);

Route::get('/api/autor/{id}', [ApiController::class, 'getAutor']);

Route::post('/api/autor', [ApiController::class, 'insertAutor']);

Route::post('/api/llibre', [ApiController::class, 'insertLlibre']);

Route::delete('/api/llibre/{id}', [ApiController::class, 'deleteLlibre']);

Route::put('/api/llibre/{id}', [ApiController::class, 'updateLlibre']);
