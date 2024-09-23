<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use Carbon\Carbon;

class FinanceiroController extends Controller
{
    public function index() {
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

        foreach ($models as $label => $model) {
            $labels[] = $label;            
            $data[] = $model::count();   
        }


        $entradas = Historico::with('historicoable')
        ->where('descricao', 'like', '%Entrada%') 
        ->get();

        foreach ($entradas as $entrada) {
            if (isset($entrada->historicoable->quantidade)) {
                $mes = Carbon::parse($entrada->created_at)->month; 

                $entradasPM[$mes - 1] += $entrada->historicoable->quantidade;
            }
        }

    
        return view('dashboard.financeiro', compact('labels', 'data', 'entradas', 'entradasPM', 'totalCamisetas', 'totalTecidos', 'totalTintas'));
    }
}
