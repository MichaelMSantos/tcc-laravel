<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Tinta;

class TintaController extends Controller
{
    public function index()
    {
        $tintas = Tinta::all();
        return view('dashboard.estoque.tintas', compact('tintas'));
    }

    public function store(Request $request)
    {
        $tintas = new Tinta;

        $tintas->codigo = $request->codigo;
        $tintas->marca = $request->marca;
        $tintas->cor = $request->cor;
        $tintas->quantidade = $request->quantidade;
        $tintas->capacidade = $request->capacidade;

        $tintas->save();

        return back()->with('sucesso', 'Tinta registrada com sucesso');
    }

    public function edit($id)
    {
        $tinta = Tinta::where('codigo', $id)->firstOrFail();

        return view('dashboard.estoque.modal.tinta-edit', compact('tinta'));
    }

    public function update(Request $request)
    {

        $tinta = Tinta::all();

        Tinta::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Tinta atualizada com sucesso!');
    }


}
