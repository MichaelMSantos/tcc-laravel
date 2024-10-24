<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CamisetaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\MonitoramentoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TecidoController;
use App\Http\Controllers\TintaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.validate');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::middleware(['auth'])
    ->prefix('dashboard/camisetas')->group(function () {
        Route::get('/', [CamisetaController::class, 'index'])->name('camiseta.index');
        Route::post('/', [CamisetaController::class, 'store']);
        Route::get('/edit/{id}', [CamisetaController::class, 'edit'])->name('camiseta.edit');
        Route::delete('/delete/{id}', [CamisetaController::class, 'destroy'])->name('camiseta.delete');
        Route::put('/update/{id}', [CamisetaController::class, 'update'])->name('camiseta.update');
        Route::get('/pesquisar', [SearchController::class, 'camiseta_search'])->name('camiseta.search');
    });

Route::middleware(['auth'])
    ->prefix('dashboard/tintas')->group(function () {
        Route::get('/', [TintaController::class, 'index'])->name('tinta.index');
        Route::post('/', [TintaController::class, 'store']);
        Route::get('/edit/{id}', [TintaController::class, 'edit'])->name('tinta.edit');
        Route::delete('/delete/{id}', [TintaController::class, 'destroy'])->name('tinta.delete');
        Route::put('/update/{id}', [TintaController::class, 'update'])->name('tinta.update');
        Route::get('/pesquisar', [SearchController::class, 'tinta_search'])->name('tinta.search');
    });

Route::middleware(['auth'])
    ->prefix('dashboard/tecidos')->group(function () {
        Route::get('/', [TecidoController::class, 'index'])->name('tecido.index');
        Route::post('/', [TecidoController::class, 'store']);
        Route::get('/edit/{id}', [TecidoController::class, 'edit'])->name('tecido.edit');
        Route::delete('/delete/{id}', [TecidoController::class, 'destroy'])->name('tecido.delete');
        Route::put('/update/{id}', [TecidoController::class, 'update'])->name('tecido.update');
        Route::get('/pesquisar', [SearchController::class, 'tecido_search'])->name('tecido.search');
    });



Route::middleware(['auth'])
    ->prefix('dashboard')->group(function () {
        Route::get('/monitoramento', [MonitoramentoController::class, 'index']);
        Route::get('/entradas/pesquisar', [SearchController::class, 'entrada_search'])->name('entrada.search');
        Route::get('/pesquisar/saida', [SearchController::class, 'saida_search'])->name('saida.search');
        Route::get('/show/{id}', [MonitoramentoController::class, 'show'])->name('historico.show');

        Route::get('pouco-estoque', [DashboardController::class, 'pouco_estoque']);
        Route::post('solicitacao', [DashboardController::class, 'solicitacao'])->name('fazer.solicitacao');

        Route::get('/funcionarios', [UserController::class, 'index'])->name('funcionarios.index');
        Route::put('/funcionarios/update/{id}', [UserController::class, 'update'])->name('funcionario.update');
        Route::delete('/funcionarios/delete/{id}', [UserController::class, 'destroy'])->name('funcionario.delete');

        Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedor.index');
        Route::post('/fornecedores', [FornecedorController::class, 'store']);
        Route::delete('/fornecedores/delete/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.delete');
        Route::put('/fornecedores/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
        Route::get('/contatos/{id}', [FornecedorController::class, 'show'])->name('fornecedor.show');

        Route::post('/enviar', [DashboardController::class, 'enviar'])->name('enviar.produto');
        Route::get('/envios', [DashboardController::class, 'envios']);
        Route::delete('/historico/{historico}/devolver', [DashboardController::class, 'devolucao'])->name('devolver');

        Route::get('/consultar', [ConsultaController::class, 'index']);
        Route::get('/consultar/produto', [ConsultaController::class, 'consultarProduto'])->name('consultar.produto');
        Route::get('/buscar-codigos', [ConsultaController::class, 'buscarCodigos'])->name('buscar.codigos');

    });

Route::get('/produtos/{categoria}', [DashboardController::class, 'buscarProduto']);
