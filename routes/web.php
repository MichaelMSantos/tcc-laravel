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
route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index'])->name('camiseta.index');
Route::post('/dashboard/estoque/camisetas', [CamisetaController::class, 'store']);
Route::get('/dashboard/estoque/camisetas/edit/{codigo}', [CamisetaController::class, 'edit'])->name('camiseta.edit');
Route::delete('/dashboard/estoque/camisetas/delete/{codigo}', [CamisetaController::class, 'destroy'])->name('camiseta.delete');
Route::put('/dashboard/estoque/camisetas/update/{codigo}', [CamisetaController::class, 'update'])->name('camiseta.update');

// View da pagina tecidos
Route::get('/dashboard/estoque/tecidos', [TecidoController::class, 'index']);


Route::get('/dashboard/estoque/tintas', function () {
    return view('dashboard.estoque.tintas');
});


// View da Pagina de Fornecedores
Route::get('/dashboard/fornecedores', [FornecedorController::class, 'index']);



Route::get('/dashboard/funcionarios', function () {
    return view('dashboard.funcionarios');
});

Route::get('/dashboard/pouco-estoque', function () {
    return view('dashboard.pouco-estoque');
});

Route::get('/dashboard/financeiro', function () {
    return view('dashboard.financeiro');
});
