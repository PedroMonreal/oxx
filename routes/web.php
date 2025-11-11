<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('productos');
});

// Define la ruta que cargará la vista productos.blade.php
Route::get('/inventario', function () {
    return view('productos'); 
});

// Vista para CREAR un nuevo producto
Route::get('/crear', function () {
    return view('crear');
})->name('crear');

// Vista para LISTAR y EDITAR/ELIMINAR productos
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

//Vista para EDITAR un producto específico (requiere el ID)
Route::get('/editar/{id}', function ($id) {
    // La vista 'editar' tendrá acceso a la variable $id
    return view('editar', ['id' => $id]); 
})->name('editar');