<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;

use Illuminate\Http\Request;

class CamisetaController extends Controller
{
    public function index()
    {
        $camisetas = Camiseta::all();
        return view('dashboard.estoque.camisetas', compact('camisetas'));
    }

    public function store(Request $request)
    {
        $camiseta = new Camiseta;

        $camiseta->codigo = $request->codigo;
        $camiseta->modelo = $request->modelo;
        $camiseta->tamanho = $request->tamanho;
        $camiseta->cor = $request->cor;
        $camiseta->quantidade = $request->quantidade;
        $camiseta->categoria = $request->categoria;

        $camiseta->save();

        return back()->with('sucesso', 'Camiseta registrada com sucesso');
    }

    public function edit($codigo)
    {
        $camiseta = Camiseta::findOrFail($codigo);

        return view('dashboard.estoque.modal.camiseta-edit', ['camiseta' => $camiseta]);
    }

    public function update(Request $request)
    {
        Camiseta::findOrFail($request->codigo)->update($request->all());

        $camisetas = Camiseta::all();
        return back()->with('sucesso', 'Camiseta atualizada com sucesso!');
    }


    public function destroy($codigo)
    {
        $camiseta = Camiseta::findOrFail($codigo);

        $camiseta->delete();

        return redirect()->route('camiseta.index')->with('sucesso', 'Produto excluido com sucesso');
    }
}
