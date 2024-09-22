<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
        // Retorne a view 'chart' com as variáveis 'labels' e 'data'
        return view('dashboard.financeiro', compact('labels', 'data'));
    }
}
