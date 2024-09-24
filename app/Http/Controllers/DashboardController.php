<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Camiseta;
use App\Models\Tecido;
use App\Models\Tinta;
use App\Models\Historico;

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

        $totalTintas = DB::table('tintas')->count();
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

    public function buscarProduto($categoria)
    {
        switch ($categoria) {
            case 'Camiseta':
                $produtos = Camiseta::select('id', 'codigo', 'modelo', 'tamanho', 'quantidade', 'cor')->get();
                break;
            case 'Tecido':
                $produtos = Tecido::select('id', 'codigo', 'cor', 'medida', 'quantidade')->get();
                break;
            case 'Tinta':
                $produtos = Tinta::select('id', 'codigo', 'cor', 'capacidade', 'quantidade')->get();
                break;
            default:
                return response()->json([], 404);
        }

        return response()->json($produtos);
    }

    public function envio(Request $request)
    {
        $validated = $request->validate([
            'categoria' => 'required',
            'produto_id' => 'required|integer',
            'quantidade' => 'required|integer|min:1',
        ]);

        switch ($validated['categoria']) {
            case 'Camiseta':
                $produto = Camiseta::findOrFail($validated['produto_id']);
                break;
            case 'Tecido':
                $produto = Tecido::findOrFail($validated['produto_id']);
                break;
            case 'Tinta':
                $produto = Tinta::findOrFail($validated['produto_id']);
                break;
            default:
                return back()->withErrors(['categoria' => 'Categoria inválida']);
        }

        if ($produto->quantidade < $validated['quantidade']) {
            return back()->withErrors(['quantidade' => 'Quantidade insuficiente em estoque']);
        }

        $produto->quantidade -= $validated['quantidade'];
        $produto->save();

        Historico::create([
            'historicoable_id' => $produto->id,
            'historicoable_type' => get_class($produto),  
            'descricao' => 'Saída',
            'quantidade' => $validated['quantidade'],  
            'created_at' => now(),  
        ]);
        return back()->with('sucesso', 'Produto enviado com sucesso!');
    }


    // Pouco Estoque 

    public function pouco_estoque(){
        
    }
}
