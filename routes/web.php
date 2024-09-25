<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TecidoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\TintaController;


// LOGIN & LOGOUT ROUTE
Route::get('/', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('user.validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/produtos/{categoria}', [DashboardController::class, 'buscarProduto']);
Route::post('/enviar', [DashboardController::class, 'envio'])->name('enviar.produto');


Route::get('/dashboard/envios', function() {
    return view('.dashboard.envios');
});

// rotas da pagina de camisetas
Route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index'])
    ->name('camiseta.index')
    ->middleware('auth');
Route::post('/dashboard/estoque/camisetas', [CamisetaController::class, 'store']);
Route::get('/dashboard/estoque/camisetas/edit/{id}', [CamisetaController::class, 'edit'])
    ->name('camiseta.edit')
    ->middleware('auth');
Route::delete('/dashboard/estoque/camisetas/delete/{id}', [CamisetaController::class, 'destroy'])
    ->name('camiseta.delete')
    ->middleware('auth');
Route::put('/dashboard/estoque/camisetas/update/{id}', [CamisetaController::class, 'update'])
    ->name('camiseta.update')
    ->middleware('auth');

// rotas da pagina tecidos
Route::get('/dashboard/estoque/tecidos', [TecidoController::class, 'index'])->name('tecido.index')
    ->middleware('auth');
Route::get('/dashboard/estoque/tecidos/edit/{id}', [TecidoController::class, 'edit'])
    ->name('tecido.edit')
    ->middleware('auth');
Route::post('/dashboard/estoque/tecidos', [TecidoController::class, 'store']);
Route::delete('/dashboard/estoque/tecidos/delete/{id}', [TecidoController::class, 'destroy'])
    ->name('tecido.delete')
    ->middleware('auth');
Route::put('/dashboard/estoque/tecidos/update/{id}', [TecidoController::class, 'update'])
    ->name('tecido.update')
    ->middleware('auth');


// rotas da pagina tintas 
Route::get('/dashboard/estoque/tintas', [TintaController::class, 'index'])
    ->name('tinta.index')
    ->middleware('auth');
Route::post('/dashboard/estoque/tintas', [TintaController::class, 'store'])
    ->middleware('auth');
Route::get('/dashboard/estoque/tintas/edit/{id}', action: [TintaController::class, 'edit'])
    ->name('tinta.edit')
    ->middleware('auth');
Route::delete('/dashboard/estoque/tintas/delete/{id}', [TintaController::class, 'destroy'])
    ->name('tinta.delete')
    ->middleware('auth');
Route::put('/dashboard/estoque/tintas/update/{id}', [TintaController::class, 'update'])
    ->name('tinta.update')
    ->middleware('auth');


// rotas da Pagina de Fornecedores
Route::get('/dashboard/fornecedores', [FornecedorController::class, 'index'])
    ->name('fornecedor.index')
    ->middleware('auth');
Route::post('/dashboard/fornecedores', [FornecedorController::class, 'store']);
Route::get('/dashboard/fornecedores/edit/{id}', action: [FornecedorController::class, 'edit'])
    ->name('fornecedor.edit')
    ->middleware('auth');
Route::delete('/dashboard/fornecedores/delete/{id}', [FornecedorController::class, 'destroy'])
    ->name('fornecedor.delete')
    ->middleware('auth');
Route::put('/dashboard/fornecedores/update/{id}', [FornecedorController::class, 'update'])
    ->name('fornecedor.update')
    ->middleware('auth');
Route::get('/contatos/{id}', [FornecedorController::class, 'show'])
    ->name('fornecedor.show');


// rotas da pagina de funcionarios
Route::get('/dashboard/funcionarios', [UserController::class, 'index'])
    ->name('funcionarios.index')
    ->middleware('auth');
Route::post('/dashboard/funcionarios', [UserController::class, 'store']);
Route::get('/dashboard/funcionarios/edit/{id}', action: [UserController::class, 'edit'])
    ->name('funcionario.edit')
    ->middleware('auth');
Route::delete('/dashboard/funcionarios/delete/{id}', [UserController::class, 'destroy'])
    ->name('funcionario.delete')
    ->middleware('auth');
Route::put('/dashboard/funcionarios/update/{id}', [UserController::class, 'update'])
    ->name('funcionario.update')
    ->middleware('auth');


Route::get('/dashboard/pouco-estoque', )->middleware('auth');


// Route Monitarmento
Route::get('/dashboard/financeiro',[FinanceiroController::class, 'index'])
->middleware('auth');


Route::get('/dashboard/show/{id}', [FinanceiroController::class, 'show'])->name('historico.show')
->middleware('auth');