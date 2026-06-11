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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
