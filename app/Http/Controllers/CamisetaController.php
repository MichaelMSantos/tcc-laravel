<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CamisetaController extends Controller
{
    public function index() {
        return view('dashboard.estoque.camisetas');
    }

    public function create() {
        
    }
}
