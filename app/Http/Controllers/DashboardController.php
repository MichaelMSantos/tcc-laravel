<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $recentes = DB::select("
            (SELECT 'tintas' AS origem, tintas.codigo, tintas.quantidade, tintas.created_at, fornecedores.nome AS fornecedor
            FROM tintas
            JOIN fornecedores ON tintas.fornecedor_id = fornecedores.id
            ORDER BY tintas.created_at DESC
            LIMIT 3)
            UNION ALL
            (SELECT 'camisetas' AS origem, camisetas.codigo, camisetas.quantidade, camisetas.created_at, fornecedores.nome AS fornecedor
            FROM camisetas
            JOIN fornecedores ON camisetas.fornecedor_id = fornecedores.id
            ORDER BY camisetas.created_at DESC
            LIMIT 3)
            UNION ALL
            (SELECT 'tecidos' AS origem, tecidos.codigo, tecidos.quantidade, tecidos.created_at, fornecedores.nome AS fornecedor
            FROM tecidos
            JOIN fornecedores ON tecidos.fornecedor_id = fornecedores.id
            ORDER BY tecidos.created_at DESC
            LIMIT 3)
            ORDER BY created_at DESC
            LIMIT 3
        ");

        $totalTintas= DB::table('tintas')->count();
        $totalCamisetas = DB::table('camisetas')->count();
        $totalTecidos = DB::table('tecidos')->count();

        $totalRegitro = $totalTintas + $totalCamisetas + $totalTecidos;


        $sevenDaysAgo = Carbon::now()->subDays(7);
        $adicoesTintas = DB::table('tintas')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesCamisetas = DB::table('camisetas')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesTecidos = DB::table('tecidos')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesRecentes = $adicoesTintas + $adicoesCamisetas + $adicoesTecidos;

        $semEstoqueTintas = DB::table('tintas')->where('quantidade', 0)->count();
        $semEstoqueCamisetas = DB::table('camisetas')->where('quantidade', 0)->count();
        $semEstoqueTecidos = DB::table('tecidos')->where('quantidade', 0)->count();
        $semEstoqueTotal = $semEstoqueTintas + $semEstoqueCamisetas + $semEstoqueTecidos;


        return view('dashboard.dashboard', ['recentes' => $recentes, 'totalRegistro' => $totalRegitro, 'adicoesRecentes' => $adicoesRecentes, 'semEstoqueTotal' => $semEstoqueTotal]);
    }
}
