<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;

use Illuminate\Http\Request;

use App\Rules\UniqueCodigo;

class CamisetaController extends Controller
{

    // Index
    public function index()
    {
        $camisetas = Camiseta::all();
        return view('dashboard.estoque.camisetas', compact('camisetas'));
    }


    // Insert
    public function store(Request $request)
    {

        $request->validate([
            'codigo' => ['required', new UniqueCodigo], 
            'modelo' => 'required',
            'tamanho' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'categoria' => 'required'
        ]);
        
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


    // Edit
    public function edit($id)
    {
        $camiseta = Camiseta::where('codigo', $id)->firstOrFail();

        return view('modal.estoque.camiseta-edit', compact('camiseta'));
    }


    // Update
    public function update(Request $request)
    {
        $request->validate([
            'codigo' => ['required', 'unique:camisetas,codigo,' . $request->id], 
            'modelo' => 'required',
            'tamanho' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'categoria' => 'required'
        ]);

        $camisetas = Camiseta::all();

        Camiseta::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Camiseta atualizada com sucesso!');
    }


    // Delete
    public function destroy($id)
    {
        $camiseta = Camiseta::findOrFail($id);

        $camiseta->delete();

        return redirect()->route('camiseta.index')->with('sucesso', 'Camiseta excluida com sucesso!');
    }
}
