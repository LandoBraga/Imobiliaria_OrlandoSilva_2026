<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Apartamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    // 1. Listar todas as vendas (Histórico Comercial)
    public function index()
    {
        $vendas = Venda::with(['cliente', 'apartamento'])->get();
        return view('vendas.index', compact('vendas'));
    }

    // 2. Mostrar o formulário de registo
    public function create()
    {
        $clientes = Cliente::all();
        $apartamentos = Apartamento::where('estado', 'Disponível')->get();
        
        return view('vendas.create', compact('clientes', 'apartamentos'));
    }

    // 3. Gravar a venda na Base de Dados
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'apartamento_id' => 'required|exists:apartamentos,id',
            'valor_venda' => 'required|numeric|min:0',
            'data_venda' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            $venda = Venda::create($request->all());
            $venda->apartamento->update(['estado' => 'Vendido']);
        });

        return redirect()->route('vendas.index')->with('success', 'Venda registada com sucesso!');
    }

    // 4. Mostrar os detalhes de uma venda específica
    public function show($id)
    {
        // Carrega a venda com o cliente e o apartamento associados
        $venda = Venda::with(['cliente', 'apartamento'])->findOrFail($id);

        return view('vendas.show', compact('venda'));
    }
}