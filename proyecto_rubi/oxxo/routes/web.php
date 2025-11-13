

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TurnoController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD de productos
Route::resource('productos', ProductoController::class);

// CRUD de turnos
Route::resource('turnos', TurnoController::class);
