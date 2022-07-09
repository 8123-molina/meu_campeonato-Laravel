<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\TimeController;

//Route Campeonato
Route::get('/', [CampeonatoController::class, 'index']);
Route::post('/createCampeonato', [CampeonatoController::class, 'create'])->name('createCampeonato');
Route::get('/jogos/{id}', [CampeonatoController::class, 'getJogos'])->name('getJogos');

//Route Time
Route::post('/createTime', [TimeController::class, 'create'])->name('createTime');
Route::post('/deleteTime', [TimeController::class, 'delete'])->name('deleteTime');
Route::get('/time', [TimeController::class, 'getTime'])->name('getTime');

//Route Jogos
Route::get('/createPartida/{id}', [PartidaController::class, 'createPartida'])->name('createPartida');
Route::get('/sortearJogos/jogos/{id}', [PartidaController::class, 'sortear'])->name('sortearJgos');