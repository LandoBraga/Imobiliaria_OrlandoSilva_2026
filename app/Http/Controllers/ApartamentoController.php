<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Vai buscar todos os apartamentos à base de dados
    $apartamentos = \App\Models\Apartamento::all();

    // Envia os dados para a view de listagem
    return view('apartamentos.index', compact('apartamentos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('apartamentos.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
{
    // 1. Validação dos campos obrigatórios da ficha de trabalho
    $validated = $request->validate([
        'referencia' => 'required|string|unique:apartamentos,referencia|max:50',
        'tipologia' => 'required|string|max:10', // Ex: T0, T1, T2
        'morada' => 'required|string|max:255',
        'area' => 'required|integer|min:1',
        'preco' => 'required|numeric|min:0',
        'estado' => 'required|string|in:Disponível,Vendido',
    ]);

    // 2. Grava o apartamento no MySQL
    \App\Models\Apartamento::create($validated);

    // 3. Redireciona para a tabela com mensagem de sucesso
    return redirect()->route('apartamentos.index')->with('success', 'Apartamento registado com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
