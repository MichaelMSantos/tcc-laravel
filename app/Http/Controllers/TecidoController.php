<?php

namespace App\Http\Controllers;

use App\Models\Tecido;
use Illuminate\Http\Request;

class TecidoController extends Controller
{
    public function index() {
        $tecidos = Tecido::all();

        return view('dashboard.estoque.tecidos', ['tecidos' => $tecidos]);
    }

    public function store(Request $request){
        $tecido = new Tecido();

        $tecido->id = $request->id;
        $tecido->medida = $request->medida;
        $tecido->cor = $request->cor;
        $tecido->quantidade = $request->quantidade;
        $tecido->capacidade = $request->capacidade;

        $tecido->save();

        return back()->with('sucesso', 'Tecido registrado com sucesso');
    }

    public function edit($id) {
        $tinta = Tecido::where('codigo', $id)->firstOrFail();
    
        return view('dashboard.estoque.modal.tinta-edit', compact('tinta'));

    }
}
