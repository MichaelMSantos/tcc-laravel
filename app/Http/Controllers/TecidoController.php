<?php

namespace App\Http\Controllers;

use App\Models\Tecido;
use Illuminate\Http\Request;
use App\Rules\UniqueCodigo;

class TecidoController extends Controller
{
    public function index()
    {
        $tecidos = Tecido::all();

        return view('dashboard.estoque.tecidos', ['tecidos' => $tecidos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['required', new UniqueCodigo],
            'medida' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer'
        ]);

        $tecidos = new Tecido();

        $tecidos->id = $request->id;
        $tecidos->codigo = $request->codigo;
        $tecidos->medida = $request->medida;
        $tecidos->cor = $request->cor;
        $tecidos->quantidade = $request->quantidade;

        $tecidos->save();

        return back()->with('sucesso', 'Tecido registrado com sucesso');
    }

    public function edit($id)
    {
        $tecido = Tecido::where('codigo', $id)->firstOrFail();

        return view('modal.estoque.tecido-edit', compact('tecido'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'codigo' => ['required', new UniqueCodigo],
            'medida' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer'
        ]);

        $tecido = Tecido::all();

        Tecido::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Tecido atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tecido = Tecido::findOrFail($id);

        $tecido->delete();

        return redirect()->route('tecido.index')->with('sucesso', 'Produto excluido com sucesso');
    }
}
