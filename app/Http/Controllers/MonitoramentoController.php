<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitoramentoController extends Controller
{
    public function index()
    {
        $models = [
            'Tecidos' => \App\Models\Tecido::class,
            'Tintas' => \App\Models\Tinta::class,
            'Camisetas' => \App\Models\Camiseta::class,
        ];

        $totalCamisetas = \App\Models\Camiseta::sum('quantidade');
        $totalTecidos = \App\Models\Tecido::sum('quantidade');
        $totalTintas = \App\Models\Tinta::sum('quantidade');

        $labels = [];
        $data = [];

        $entradasPM = array_fill(0, 12, 0);
        $saidasPM = array_fill(0, 12, 0);

        foreach ($models as $label => $model) {
            $labels[] = $label;
            $data[] = $model::count();
        }


        // Entradas

        $entradas = Historico::with('historicoable', 'historicoable.fornecedor')
            ->where('descricao', 'Entrada')
            ->orderByDesc('created_at')
            ->paginate(5);


        // $dataEntradas = Historico::with('historicoable', 'historicoable.fornecedor')
        //     ->where('descricao', 'Entrada')
        //     ->orderByDesc('created_at')
        //     ->get();

        // foreach ($dataEntradas as $entrada) {
        //     if (isset($entrada->historicoable->quantidade)) {
        //         $mes = Carbon::parse($entrada->created_at)->month;
        //         $entradasPM[$mes - 1] += $entrada->historicoable->quantidade;
        //     }
        // }


        // Saidas

        $saidas = Historico::with('historicoable')
            ->where('descricao', 'Saída')
            ->orderByDesc('created_at')
            ->paginate(5);

        //     $dataSaidas = Historico::with('historicoable')
        //     ->where('descricao', 'Saída')
        //     ->orderByDesc('created_at')
        //     ->get();

        // foreach ($dataSaidas as $saida) {
        //     if (isset($saida->quantidade)) {
        //         $mes = Carbon::parse($saida->created_at)->month;
        //         $saidasPM[$mes - 1] += $saida->quantidade;
        //     }
        // }

        $historicos = Historico::select('descricao', 'quantidade', 'created_at')
            ->whereIn('descricao', ['Entrada', 'Saída'])
            ->get();

        foreach ($historicos as $historico) {
            $mes = Carbon::parse($historico->created_at)->month;

            if ($historico->descricao === 'Entrada') {
                $entradasPM[$mes - 1] += $historico->quantidade;
            } elseif ($historico->descricao === 'Saída') {
                $saidasPM[$mes - 1] += $historico->quantidade;
            }
        }


        return view('pages.monitoramento', compact(
            'labels',
            'saidas',
            'saidasPM',
            'data',
            'entradas',
            'entradasPM',
            'totalCamisetas',
            'totalTecidos',
            'totalTintas'
        ));
    }

    public function show($id)
    {
        $entrada = Historico::findOrFail($id);

        if ($entrada->historicoable) {
            $detalhes = $entrada->historicoable;
            $tipo = class_basename($entrada->historicoable_type);
        } else {
            return redirect()->back()->with('error', 'Registro não encontrado.');
        }

        return view('historico.show', compact('detalhes', 'tipo'));
    }
}
