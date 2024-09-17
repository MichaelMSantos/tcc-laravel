<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamisetaController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});


// View da pagina de camisetas
Route::get('/dashboard/estoque/camisetas', [CamisetaController::class, 'index']);



Route::get('/dashboard/estoque/tecidos', function () {
    return view('dashboard.estoque.tecidos');
});

Route::get('/dashboard/estoque/tintas', function () {
    return view('dashboard.estoque.tintas');
});


Route::get('/dashboard/fornecedores', function () {
    return view('dashboard.fornecedores');
});

Route::get('/dashboard/funcionarios', function () {
    return view('dashboard.funcionarios');
});

Route::get('/dashboard/pouco-estoque', function () {
    return view('dashboard.pouco-estoque');
});

