<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartamento;

class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Captura os valores que o utilizador vai digitar ou clicar no ecrã
        $pesquisa  = $request->input('search');
        $tipologia = $request->input('tipologia');
        $ordenar   = $request->input('order_by', 'id'); // Se não escolher, ordena por ID
        $direcao   = $request->input('direction', 'asc'); // Direção padrão: Crescente

        // Inicia a query na tabela de apartamentos
        $query = Apartamento::query();

        // Filtro 1: Barra de Pesquisa (pesquisa por Referência ou Morada)
        if ($pesquisa) {
            $query->where(function ($q) use ($pesquisa) {
                $q->where('referencia', 'like', "%{$pesquisa}%")
                    ->orWhere('morada', 'like', "%{$pesquisa}%");
            });
        }

        // Filtro 2: Seleção de Tipologia (T0, T1, T2...)
        if ($tipologia) {
            $query->where('tipologia', $tipologia);
        }

        // Ordenação dinâmica e segura (evita SQL Injection limitando as colunas permitidas)
        $colunasPermitidas = ['id', 'tipologia', 'area', 'preco'];
        if (in_array($ordenar, $colunasPermitidas)) {
            $query->orderBy($ordenar, $direcao);
        }

        // Executa a query final
        $apartamentos = $query->get();

        // Devolve os dados para a view, mantendo os filtros ativos no ecrã
        return view('apartamentos.index', compact('apartamentos', 'pesquisa', 'tipologia', 'ordenar', 'direcao'));
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
