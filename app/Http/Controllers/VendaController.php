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
        // Validação robusta dos campos vindos do formulário
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'apartamento_id' => 'required|exists:apartamentos,id,estado,Disponível',
            'data_venda' => 'required|date',
            'valor_venda' => 'required|numeric|min:0',
            'observacoes' => 'nullable|string',
        ]);

        // Executa a gravação e a alteração de estado em segurança
        DB::transaction(function () use ($request) {
            Venda::create([
                'cliente_id'     => $request->cliente_id,
                'apartamento_id' => $request->apartamento_id,
                'data_venda'     => $request->data_venda,
                'valor_venda'    => $request->valor_venda,
                'observacoes'    => $request->observacoes,
            ]);

            $apartamento = Apartamento::find($request->apartamento_id);
            $apartamento->update(['estado' => 'Vendido']);
        });

        // Força o redirecionamento explícito para a lista de histórico com mensagem de sucesso
        return redirect()->route('vendas.index')->with('success', 'Venda registada com sucesso! O estado do apartamento foi alterado para Vendido.');

        public function show($id)
{
    // Carrega a venda com o cliente e o apartamento associados
    $venda = \App\Models\Venda::with(['cliente', 'apartamento'])->findOrFail($id);

    return view('vendas.show', compact('venda'));
}
    }
}