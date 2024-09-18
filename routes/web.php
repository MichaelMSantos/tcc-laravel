<?php

use App\Http\Controllers\TecidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\TintaController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});


// View da pagina de camisetas
route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index'])->name('camiseta.index');
Route::post('/dashboard/estoque/camisetas', [CamisetaController::class, 'store']);
Route::get('/dashboard/estoque/camisetas/edit/{id}', [CamisetaController::class, 'edit'])->name('camiseta.edit');
Route::delete('/dashboard/estoque/camisetas/delete/{id}', [CamisetaController::class, 'destroy'])->name('camiseta.delete');
Route::put('/dashboard/estoque/camisetas/update/{id}', [CamisetaController::class, 'update'])->name('camiseta.update');

// View da pagina tecidos
Route::get('/dashboard/estoque/tecidos', [TecidoController::class, 'index']);
Route::get('/dashboard/estoque/tecidos/edit/{id}', [TecidoController::class, 'edit']);



// View da pagina tintas 
route::get('/dashboard/estoque/tintas', [TintaController::class, 'index'])->name('tinta.index');
Route::post('/dashboard/estoque/tintas', [TintaController::class, 'store']);
Route::get('/dashboard/estoque/tintas/edit/{id}', action: [TintaController::class, 'edit'])->name('tinta.edit');
// Route::delete('/dashboard/estoque/tintas/delete/{id}', [TintaController::class, 'destroy'])->name('tinta.delete');
Route::put('/dashboard/estoque/tintas/update/{id}', [TintaController::class, 'update'])->name('tinta.update');


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
