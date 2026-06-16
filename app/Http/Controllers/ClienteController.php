<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(\Illuminate\Http\Request $request)
{
    // Captura o termo de pesquisa digitado pelo utilizador
    $pesquisa = $request->input('search');

    // Inicia a query na tabela de clientes
    $query = \App\Models\Cliente::query();

    // Se houver pesquisa, filtra por Nome ou por NIF
    if ($pesquisa) {
        $query->where('nome', 'like', "%{$pesquisa}%")
              ->orWhere('nif', 'like', "%{$pesquisa}%");
    }

    // Ordena por ordem alfabética de nome
    $clientes = $query->orderBy('nome', 'asc')->get();

    // Envia os dados para a view mantendo a variável de pesquisa ativa
    return view('clientes.index', compact('clientes', 'pesquisa'));
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
    public function destroy($id)
{
    // 1. Localiza o cliente pelo ID na base de dados
    $cliente = \App\Models\Cliente::findOrFail($id);

    // 2. Bloqueia a eliminação se houver histórico de vendas
    if ($cliente->vendas()->exists()) {
        return redirect()->back()->with('error', 'Não pode apagar um cliente com histórico de compras!');
    }

    // 3. Se passou na validação, apaga o registo com segurança
    $cliente->delete();

    return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
}
}

