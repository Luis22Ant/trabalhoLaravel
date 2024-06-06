<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\QuestaoController;

Route::get('/', [LoginController::class, 'index'])->name('login.index');

Route::group(['middleware' => 'web'], function () {
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
});


Route::post('/teste', [TesteController::class, 'store'])->name('teste.store');

Route::post('/questao', [QuestaoController::class, 'store'])->name('questao.store');

Route::get('/teste/{id}/questoes', [TesteController::class, 'getQuestoesDoTeste'])->name('teste.questoes');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
