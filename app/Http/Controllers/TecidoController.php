<?php

namespace App\Http\Controllers;

use App\Models\Tecido;
use Illuminate\Http\Request;

class TecidoController extends Controller
{
    public function index() {
        $tecidos = Tecido::all();

        return view('dashboard.estoque.tecidos', ['tecidos' => $tecidos]);
    }
}
