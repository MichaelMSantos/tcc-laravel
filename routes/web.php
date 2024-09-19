<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TecidoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\TintaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [AuthController::class, 'login'])->name('user.validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth');


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
Route::delete('/dashboard/estoque/tintas/delete/{id}', [TintaController::class, 'destroy'])->name('tinta.delete');
Route::put('/dashboard/estoque/tintas/update/{id}', [TintaController::class, 'update'])->name('tinta.update');


// View da Pagina de Fornecedores
route::get('/dashboard/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index');
Route::post('/dashboard/fornecedores', [FornecedorController::class, 'store']);
Route::get('/dashboard/fornecedores/edit/{id}', action: [FornecedorController::class, 'edit'])->name('fornecedor.edit');
Route::delete('/dashboard/fornecedores/delete/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.delete');
Route::put('/dashboard/fornecedores/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');


// VIew da pagina de funcionarios
route::get('/dashboard/funcionarios', [UserController::class, 'index'])->name('funcionarios.index');
Route::post('/dashboard/funcionarios', [UserController::class, 'store']);
Route::get('/dashboard/funcionarios/edit/{id}', action: [UserController::class, 'edit'])->name('funcionario.edit');
Route::delete('/dashboard/funcionarios/delete/{id}', [UserController::class, 'destroy'])->name('funcionario.delete');
Route::put('/dashboard/funcionarios/update/{id}', [UserController::class, 'update'])->name('funcionario.update');


Route::get('/dashboard/pouco-estoque', function () {
    return view('dashboard.pouco-estoque');
});

Route::get('/dashboard/financeiro', function () {
    return view('dashboard.financeiro');
});
