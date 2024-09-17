<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
   public function index(){
    $fornecedores = Fornecedor::all();

    return view('dashboard.fornecedores',['fornecedores' => $fornecedores]);
   }
}
