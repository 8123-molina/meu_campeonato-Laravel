<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [CampeonatoController::class, 'index']);
Route::post('/createCampeonato', [CampeonatoController::class, 'create'])->name('createCampeonato');