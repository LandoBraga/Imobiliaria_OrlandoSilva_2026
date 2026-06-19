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
        // Captura os filtros e parâmetros da URL
        $pesquisa  = $request->input('search');
        $tipologia = $request->input('tipologia');
        $ordenar   = $request->input('order_by', 'id');
        $direcao   = $request->input('order_direction', 'asc');
        
        // Novos parâmetros para os cartões clicáveis
        $estado    = $request->input('estado'); 
        $layout    = $request->input('layout', 'table'); // 'table' por omissão, ou 'grid'

        // Inicia a query
        $query = Apartamento::query();

        // Filtro por Barra de Pesquisa
        if ($pesquisa) {
            $query->where(function ($q) use ($pesquisa) {
                $q->where('referencia', 'like', "%{$pesquisa}%")
                  ->orWhere('morada', 'like', "%{$pesquisa}%");
            });
        }

        // Filtro por Tipologia
        if ($tipologia) {
            $query->where('tipologia', $tipologia);
        }

        // NOVO: Filtro automático por Estado (Disponível ou Vendido) vindo do Dashboard
        if ($estado) {
            $query->where('estado', $estado);
        }

        // Ordenação dinâmica
        $colunasPermitidas = ['id', 'tipologia', 'area', 'preco'];
        if (in_array($ordenar, $colunasPermitidas)) {
            $query->orderBy($ordenar, $direcao);
        }

        $apartamentos = $query->get();

        // Passa todas as variáveis para a View, incluindo o layout e o estado
        return view('apartamentos.index', compact(
            'apartamentos', 'pesquisa', 'tipologia', 'ordenar', 'direcao', 'estado', 'layout'
        ));
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