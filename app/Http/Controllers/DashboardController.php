<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Camiseta;
use App\Models\Tecido;
use App\Models\Tinta;
use App\Models\Historico;


use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{

    // index
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


    public function pdfHome()
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
        $totalRegistro = $totalTintas + $totalCamisetas + $totalTecidos;

        $sevenDaysAgo = Carbon::now()->subDays(7);
        $adicoesTintas = DB::table('tintas')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesCamisetas = DB::table('camisetas')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesTecidos = DB::table('tecidos')->where('created_at', '>=', $sevenDaysAgo)->count();
        $adicoesRecentes = $adicoesTintas + $adicoesCamisetas + $adicoesTecidos;

        $semEstoqueTintas = DB::table('tintas')->where('quantidade', 0)->count();
        $semEstoqueCamisetas = DB::table('camisetas')->where('quantidade', 0)->count();
        $semEstoqueTecidos = DB::table('tecidos')->where('quantidade', 0)->count();
        $semEstoqueTotal = $semEstoqueTintas + $semEstoqueCamisetas + $semEstoqueTecidos;

        $pdf = PDF::loadView('relatorios.dashboard_pdf', [
            'recentes' => $recentes,
            'totalRegistro' => $totalRegistro,
            'adicoesRecentes' => $adicoesRecentes,
            'semEstoqueTotal' => $semEstoqueTotal
        ]);

        return $pdf->stream('dashboard-relatorio.pdf');
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


    // para enviar produto
    public function enviar(Request $request)
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

        Envio::create([
            'produto_id' => $produto->id,
            'produto_type' => get_class($produto),
            'quantidade' => $validated['quantidade'],
            // 'destinatario' => $validated['destinatario'],
        ]);

        return back()->with('sucesso', 'Produto enviado com sucesso!');
    }



    // exibir envios
    public function envios()
    {
        $saidas = Historico::with('historicoable')
            ->where('descricao', 'Saída')
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard.envios', compact('saidas'));
    }

    // Pouco Estoque

    public function pouco_estoque()
    {
        $poucoestoque = DB::select("
            (SELECT 'tintas' AS origem, tintas.codigo, tintas.quantidade, fornecedores.nome AS fornecedor, tintas.marca AS especifico1, tintas.cor AS especifico2, tintas.capacidade AS especifico3, NULL AS especifico4
                FROM tintas
                LEFT JOIN fornecedores ON tintas.fornecedor_id = fornecedores.id
                WHERE tintas.quantidade < 6)
            UNION ALL
            (SELECT 'camisetas' AS origem, camisetas.codigo, camisetas.quantidade, fornecedores.nome AS fornecedor, camisetas.modelo AS especifico1, camisetas.cor AS especifico2, camisetas.tamanho AS especifico3, NULL AS especifico4
                FROM camisetas
                LEFT JOIN fornecedores ON camisetas.fornecedor_id = fornecedores.id
                WHERE camisetas.quantidade < 6)
            UNION ALL
            (SELECT 'tecidos' AS origem, tecidos.codigo, tecidos.quantidade, fornecedores.nome AS fornecedor, tecidos.medida AS especifico1, tecidos.cor AS especifico2, NULL AS especifico3, NULL AS especifico4
                FROM tecidos
                LEFT JOIN fornecedores ON tecidos.fornecedor_id = fornecedores.id
                WHERE tecidos.quantidade < 6)
        ");
        // dd($poucoestoque);
        return view('dashboard.pouco-estoque', ['poucoestoque' => $poucoestoque]);
    }

    public function solicitacao(Request $request)
    {
        $codigo = $request->input('produtoCodigo');
        $origem = $request->input('produtoOrigem');
        $quantidadeSolicitada = $request->input('quantidadeSolicitada');

        $produto = null;
        $historicoDescricao = 'Solicitação';

        if ($origem == 'tintas') {
            DB::table('tintas')->where('codigo', $codigo)->increment('quantidade', $quantidadeSolicitada);
            $produto = DB::table('tintas')->where('codigo', $codigo)->first(); // Capturar o produto
        } elseif ($origem == 'camisetas') {
            DB::table('camisetas')->where('codigo', $codigo)->increment('quantidade', $quantidadeSolicitada);
            $produto = DB::table('camisetas')->where('codigo', $codigo)->first();
        } elseif ($origem == 'tecidos') {
            DB::table('tecidos')->where('codigo', $codigo)->increment('quantidade', $quantidadeSolicitada);
            $produto = DB::table('tecidos')->where('codigo', $codigo)->first();
        }
        if ($produto) {
            Historico::create([
                'historicoable_id' => $produto->id,
                'historicoable_type' => $origem == 'tintas' ? 'App\Models\Tinta' : ($origem == 'camisetas' ? 'App\Models\Camiseta' : 'App\Models\Tecido'),
                'descricao' => $historicoDescricao,
                'quantidade' => $quantidadeSolicitada,
                'created_at' => now(),
            ]);
        }

        return redirect()->back()->with('sucesso', 'Solicitação realizada com sucesso!');
    }

    public function devolucao($historicoable_id)
    {
        $historico = Historico::findOrFail($historicoable_id);

        // if ($historico->descricao !== 'Saída') {
        //     return back()->withErrors(['erro' => 'Apenas saídas podem ser devolvidas.']);
        // }

        $produto = null;
        switch (class_basename($historico->historicoable_type)) {
            case 'Camiseta':
                $produto = Camiseta::findOrFail($historico->historicoable_id);
                break;
            case 'Tecido':
                $produto = Tecido::findOrFail($historico->historicoable_id);
                break;
            case 'Tinta':
                $produto = Tinta::findOrFail($historico->historicoable_id);
                break;
        }

        if ($produto) {
            $produto->quantidade += $historico->quantidade;
            $produto->save();

            $historico->delete();

            $envio = Envio::where('produto_id', $produto->id)
                ->where('produto_type', get_class($produto))
                ->where('quantidade', $historico->quantidade)
                ->first();


            if ($envio) {
                $envio->delete();
            }

            return back()->with('sucesso', 'Produto devolvido ao estoque');
        }
    }
}
