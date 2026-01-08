<?php

use App\Http\Controllers\FractionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Sobre
Route::get('/sobre', [HomeController::class, 'about'])->name('about');

// Contato
Route::get('/contato', [HomeController::class, 'contact'])->name('contact');
Route::post('/contato', [HomeController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

// Listagem de imóveis
Route::get('/imoveis', [PropertyController::class, 'index'])->name('properties.index');

// Detalhes do imóvel
Route::get('/imovel/{slug}', [PropertyController::class, 'show'])->name('properties.show');

// Simulador de frações
Route::get('/fracoes', [FractionController::class, 'simulator'])->name('fractions.simulator');
Route::post('/fracoes/calcular', [FractionController::class, 'calculate'])->name('fractions.calculate');
Route::post('/fracoes/buscar', [FractionController::class, 'findFraction'])->name('fractions.find');
