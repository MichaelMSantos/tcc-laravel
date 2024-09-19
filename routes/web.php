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
route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index'])->name('camiseta.index')->middleware('auth');
Route::post('/dashboard/estoque/camisetas', [CamisetaController::class, 'store']);
Route::get('/dashboard/estoque/camisetas/edit/{id}', [CamisetaController::class, 'edit'])->name('camiseta.edit')->middleware('auth');
Route::delete('/dashboard/estoque/camisetas/delete/{id}', [CamisetaController::class, 'destroy'])->name('camiseta.delete')->middleware('auth');
Route::put('/dashboard/estoque/camisetas/update/{id}', [CamisetaController::class, 'update'])->name('camiseta.update')->middleware('auth');

// View da pagina tecidos
Route::get('/dashboard/estoque/tecidos', [TecidoController::class, 'index'])->middleware('auth');
Route::get('/dashboard/estoque/tecidos/edit/{id}', [TecidoController::class, 'edit'])->middleware('auth');



// View da pagina tintas 
route::get('/dashboard/estoque/tintas', [TintaController::class, 'index'])->name('tinta.index')->middleware('auth');
Route::post('/dashboard/estoque/tintas', [TintaController::class, 'store'])->middleware('auth');
Route::get('/dashboard/estoque/tintas/edit/{id}', action: [TintaController::class, 'edit'])->name('tinta.edit')->middleware('auth');
Route::delete('/dashboard/estoque/tintas/delete/{id}', [TintaController::class, 'destroy'])->name('tinta.delete')->middleware('auth');
Route::put('/dashboard/estoque/tintas/update/{id}', [TintaController::class, 'update'])->name('tinta.update')->middleware('auth');


// View da Pagina de Fornecedores
route::get('/dashboard/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores.index')->middleware('auth');
Route::post('/dashboard/fornecedores', [FornecedorController::class, 'store']);
Route::get('/dashboard/fornecedores/edit/{id}', action: [FornecedorController::class, 'edit'])->name('fornecedor.edit')->middleware('auth');
Route::delete('/dashboard/fornecedores/delete/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.delete')->middleware('auth');
Route::put('/dashboard/fornecedores/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update')->middleware('auth');


// VIew da pagina de funcionarios
route::get('/dashboard/funcionarios', [UserController::class, 'index'])->name('funcionarios.index')->middleware('auth');
Route::post('/dashboard/funcionarios', [UserController::class, 'store']);
Route::get('/dashboard/funcionarios/edit/{id}', action: [UserController::class, 'edit'])->name('funcionario.edit')->middleware('auth');
Route::delete('/dashboard/funcionarios/delete/{id}', [UserController::class, 'destroy'])->name('funcionario.delete')->middleware('auth');
Route::put('/dashboard/funcionarios/update/{id}', [UserController::class, 'update'])->name('funcionario.update')->middleware('auth');


Route::get('/dashboard/pouco-estoque', function () {
    return view('dashboard.pouco-estoque');
})->middleware('auth');

Route::get('/dashboard/financeiro', function () {
    return view('dashboard.financeiro');
})->middleware('auth');
