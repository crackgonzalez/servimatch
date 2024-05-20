<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicio;


Route::get('/', function () {
    $servicios = Servicio::all();
    return view('welcome', ['servicios' => $servicios]);
});
