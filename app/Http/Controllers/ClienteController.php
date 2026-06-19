<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Captura o termo de pesquisa digitado pelo utilizador
        $pesquisa = $request->input('search');
        
        // NOVO: Captura o filtro vindo do Dashboard ou dos cartões internos
        $filtro = $request->input('filtro');

        // Inicia a query na tabela de clientes
        $query = Cliente::query();

        // Se houver pesquisa, filtra por Nome ou por NIF
        if ($pesquisa) {
            $query->where(function($q) use ($pesquisa) {
                $q->where('nome', 'like', "%{$pesquisa}%")
                  ->orWhere('nif', 'like', "%{$pesquisa}%");
            });
        }

        // NOVO: Aplica o filtro dinâmico de clientes ativos/inativos
        if ($filtro === 'ativos') {
            $query->has('vendas');
        } elseif ($filtro === 'inativos') {
            $query->doesntHave('vendas');
        }

        // Ordena por ordem alfabética de nome
        $clientes = $query->orderBy('nome', 'asc')->get();

        // Novos cálculos para os cartões dinâmicos (Inspirados no UrbanMotors)
        $totalClientes = Cliente::count();
        $clientesComCompras = Cliente::has('vendas')->count();
        $clientesSemCompras = Cliente::doesntHave('vendas')->count();

        // Envia os dados, os contadores e o filtro atual para a view
        return view('clientes.index', compact(
            'clientes',
            'pesquisa',
            'filtro',
            'totalClientes',
            'clientesComCompras',
            'clientesSemCompras'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'nullable|string|max:20',
            'morada' => 'required|string|max:255',
            'nif' => 'required|string|size:9|unique:clientes,nif',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente adicionado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string|max:20',
            'nif'      => 'required|digits:9|unique:clientes,nif,' . $cliente->id,
            'morada'   => 'required|string|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->vendas()->exists()) {
            return redirect()->back()->with('error', 'Não pode apagar um cliente com histórico de compras!');
        }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
