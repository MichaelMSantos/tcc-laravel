<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;

class FinanceiroController extends Controller
{
    public function index() {
        $models = [
            'Tecidos' => \App\Models\Tecido::class,
            'Tintas' => \App\Models\Tinta::class,
            'Camisetas' => \App\Models\Camiseta::class,
        ];

        foreach ($models as $label => $model) {
            $labels[] = $label;            
            $data[] = $model::count();   
        }

        $entradas = Historico::with('historicoable')
        ->where('descricao', 'like', '%Entrada%') 
        ->get();

    
        return view('dashboard.financeiro', compact('labels', 'data', 'entradas'));
    }
}
