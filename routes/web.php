<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Bloco de rotas protegidas por login
Route::middleware(['auth'])->group(function () {
    // Rotas da nossa Imobiliária
    Route::resource('clientes', ClienteController::class);
    Route::resource('apartamentos', ApartamentoController::class);
    Route::resource('vendas', VendaController::class);

    // Rotas nativas do Perfil (Breeze) exigidas pelo menu de navegação
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';