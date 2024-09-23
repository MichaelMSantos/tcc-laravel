<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\UniqueCodigo;
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

        $request->validate([
            'codigo' => ['required', new UniqueCodigo],
            'marca' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'capacidade' => 'required'
        ]);


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

        return view('modal.estoque.tinta-edit', compact('tinta'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'codigo' => ['required', 'unique:tintas,codigo,' . $request->id], 
            'marca' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'capcidade' => 'required'
        ]);

        $tinta = Tinta::all();

        Tinta::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Tintavalue:  atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tinta = Tinta::findOrFail($id);

        $tinta->delete();

        return redirect()->route('tinta.index')->with('sucesso', 'Produto excluido com sucesso');
    }
}
