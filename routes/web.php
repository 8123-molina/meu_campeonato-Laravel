<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\TimeController;

Route::get('/', [CampeonatoController::class, 'index']);
Route::post('/createCampeonato', [CampeonatoController::class, 'create'])->name('createCampeonato');
Route::post('/createTime', [TimeController::class, 'create'])->name('createTime');
Route::post('/deleteTime', [TimeController::class, 'delete'])->name('deleteTime');
Route::post('/createPartida', [PartidaController::class, 'create'])->name('createPartida');
Route::get('/time', [TimeController::class, 'getTime'])->name('getTime');
Route::get('/partida', [PartidaController::class, 'getPartida'])->name('getPartida');
Route::get('/sortearJogos', [PartidaController::class, 'sortear'])->name('sortearJgos');