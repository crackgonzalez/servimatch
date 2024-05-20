<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('register', [UsuarioController::class, 'register'])->name('register');
Route::post('register', [UsuarioController::class, 'store'])->name('register.store');
Route::get('login', [UsuarioController::class, 'login'])->name('login');
Route::post('login', [UsuarioController::class, 'authenticate'])->name('login.authenticate');
Route::post('logout', [UsuarioController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de Servicios
    Route::resource('servicios', ServicioController::class);

    // Rutas de Categorías
    Route::resource('categorias', CategoriaController::class);

    // Rutas de Reservas
    Route::resource('reservas', ReservaController::class);
    Route::patch('reservas/{id}/estado/{estado}', [ReservaController::class, 'updateEstado'])->name('reservas.updateEstado');
});

require __DIR__.'/auth.php';
