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

        $camiseta->id = $request->id;
        $camiseta->codigo = $request->codigo;
        $camiseta->modelo = $request->modelo;
        $camiseta->tamanho = $request->tamanho;
        $camiseta->cor = $request->cor;
        $camiseta->quantidade = $request->quantidade;
        $camiseta->categoria = $request->categoria;

        $camiseta->save();

        return back()->with('sucesso', 'Camiseta registrada com sucesso');
    }

    public function edit($id)
    {
        $camiseta = Camiseta::where('codigo', $id)->firstOrFail();

        return view('dashboard.estoque.modal.camiseta-edit', compact('camiseta'));
    }

    public function update(Request $request)
    {

        $camisetas = Camiseta::all();

        Camiseta::findOrFail($request->id)->update($request->all());


        return back()->with('editado', 'Camiseta atualizada com sucesso!');
    }


    public function destroy($id)
    {
        $camiseta = Camiseta::findOrFail($id);

        $camiseta->delete();

        return redirect()->route('camiseta.index')->with('excluido', 'Camiseta excluida com sucesso!');
    }
}
