<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartamento;
use Illuminate\Support\Facades\Storage;

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
        $ordenar   = $request->input('order_by', 'id'); // Sincronizado com a View
        $direcao   = $request->input('order_direction', 'asc'); // Sincronizado com a View

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

        // Ordenação dinâmica e segura
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
    public function store(Request $request)
    {
        // 1. Validação dos campos incluindo o upload da foto
        $validated = $request->validate([
            'referencia' => 'required|string|unique:apartamentos,referencia|max:50',
            'tipologia' => 'required|string|max:10', 
            'morada' => 'required|string|max:255',
            'area' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'estado' => 'required|string|in:Disponível,Vendido',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da foto
        ]);

        // 2. Processamento do upload se uma nova foto for enviada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('apartamentos', 'public');
            $validated['foto'] = $path;
        }

        // 3. Grava o apartamento no MySQL
        Apartamento::create($validated);

        // 4. Redireciona para a tabela com mensagem de sucesso
        return redirect()->route('apartamentos.index')->with('success', 'Apartamento registado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartamento $apartamento)
    {
        return view('apartamentos.edit', compact('apartamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartamento $apartamento)
    {
        $validated = $request->validate([
            'referencia' => 'required|string|max:50|unique:apartamentos,referencia,' . $apartamento->id,
            'tipologia' => 'required|string|max:10',
            'morada' => 'required|string|max:255',
            'area' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'estado' => 'required|string|in:Disponível,Vendido',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Apaga a foto antiga do storage se ela existir
            if ($apartamento->foto) {
                Storage::disk('public')->delete($apartamento->foto);
            }
            $path = $request->file('foto')->store('apartamentos', 'public');
            $validated['foto'] = $path;
        }

        $apartamento->update($validated);

        return redirect()->route('apartamentos.index')->with('success', 'Apartamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartamento $apartamento)
    {
        if ($apartamento->foto) {
            Storage::disk('public')->delete($apartamento->foto);
        }
        
        $apartamento->delete();

        return redirect()->route('apartamentos.index')->with('success', 'Apartamento removido com sucesso!');
    }
}