<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('pages.consultar');
    }

    public function consultarProduto(Request $request)
    {
        $codigo = $request->input('codigo');

        $camiseta = DB::table('camisetas')->where('codigo', $codigo)->first();
        $tecido = DB::table('tecidos')->where('codigo', $codigo)->first();
        $tinta = DB::table('tintas')->where('codigo', $codigo)->first();

        if ($camiseta) {
            return response()->json([
                'tipo' => 'camiseta',
                'modelo' => $camiseta->modelo,
                'tamanho' => $camiseta->tamanho,
                'cor' => $camiseta->cor,
                'quantidade' => $camiseta->quantidade,
                'categoria' => $camiseta->categoria,
            ]);
        } elseif ($tecido) {
            return response()->json([
                'tipo' => 'tecido',
                'medida' => $tecido->medida,
                'cor' => $tecido->cor,
                'quantidade' => $tecido->quantidade,
            ]);
        } elseif ($tinta) {
            return response()->json([
                'tipo' => 'tinta',
                'marca' => $tinta->marca,
                'cor' => $tinta->cor,
                'quantidade' => $tinta->quantidade,
                'capacidade' => $tinta->capacidade,
            ]);
        }

        return response()->json(['message' => 'Produto não encontrado'], 404);
    }

    public function buscarCodigos(Request $request)
    {
        $termo = $request->input('query');

        $camisetas = DB::table('camisetas')->where('codigo', 'like', "%{$termo}%")->pluck('codigo');
        $tecidos = DB::table('tecidos')->where('codigo', 'like', "%{$termo}%")->pluck('codigo');
        $tintas = DB::table('tintas')->where('codigo', 'like', "%{$termo}%")->pluck('codigo');

        $codigos = $camisetas->merge($tecidos)->merge($tintas);

        return response()->json($codigos);
    }
}
