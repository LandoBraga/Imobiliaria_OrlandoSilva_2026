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
    // 1. Contagens rápidas da base de dados
    $totalClientes = \App\Models\Cliente::count();
    $totalImoveis = \App\Models\Apartamento::count();
    
    // 2. Estados dos imóveis
    $imoveisDisponiveis = \App\Models\Apartamento::where('estado', 'Disponível')->count();
    $imoveisVendidos = \App\Models\Apartamento::where('estado', 'Vendido')->count();

    // 3. Faturação total acumulada
    $faturacaoTotal = \App\Models\Venda::sum('valor_venda');

    // Envia tudo para a view do dashboard
    return view('dashboard', compact(
        'totalClientes', 
        'totalImoveis', 
        'imoveisDisponiveis', 
        'imoveisVendidos', 
        'faturacaoTotal'
    ));
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