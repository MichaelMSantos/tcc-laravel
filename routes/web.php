<?php

use App\Http\Controllers\TecidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\FornecedorController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});


// View da pagina de camisetas
Route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index']);


// View da pagina tecidos
Route::get('/dashboard/estoque/tecidos', [TecidoController::class, 'index']);


Route::get('/dashboard/estoque/tintas', function () {
    return view('dashboard.estoque.tintas');
});


// View da Pagina de Fornecedores
Route::get('/dashboard/fornecedores',[FornecedorController::class, 'index']);



Route::get('/dashboard/funcionarios', function () {
    return view('dashboard.funcionarios');
});

Route::get('/dashboard/pouco-estoque', function () {
    return view('dashboard.pouco-estoque');
});

Route::get('/dashboard/financeiro', function () {
    return view('dashboard.financeiro');
});


