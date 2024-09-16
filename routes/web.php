<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});


Route::get('/dashboard/estoque/camisetas', function () {
    return view('dashboard.estoque.camisetas');
});

Route::get('/dashboard/estoque/tecidos', function () {
    return view('dashboard.estoque.tecidos');
});

Route::get('/dashboard/estoque/tintas', function () {
    return view('dashboard.estoque.tintas');
});


Route::get('/dashboard/fornecedores', function () {
    return view('dashboard.fornecedores');
});


