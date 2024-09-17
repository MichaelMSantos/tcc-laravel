<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;

use Illuminate\Http\Request;

class CamisetaController extends Controller
{
    public function index()
    {
        $camisetas = Camiseta::all();
        return view('dashboard.estoque.camisetas', ['camisetas' => $camisetas]);
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
}
