<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // Procura todos os clientes na base de dados
    $clientes = \App\Models\Cliente::all();

    // Carrega a página index e envia a lista de clientes para lá
    return view('clientes.index', compact('clientes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Abre a página com o formulário de criação
    return view('clientes.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
{
    // 1. Validação profissional dos dados introduzidos
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:clientes,email',
        'telefone' => 'nullable|string|max:20',
        'morada' => 'required|string|max:255',
        'nif' => 'required|string|size:9|unique:clientes,nif',
    ]);

    // 2. Cria o cliente na base de dados usando o Model
    \App\Models\Cliente::create($validated);

    // 3. Redireciona de volta para a lista com mensagem de sucesso
    return redirect()->route('clientes.index')->with('success', 'Cliente adicionado com sucesso!');
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
