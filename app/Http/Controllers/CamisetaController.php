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

    public function create() {}
}
