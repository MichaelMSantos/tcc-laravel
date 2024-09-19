<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa a facade Auth

class AuthController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login()
    {
        // Validação dos campos
        validator(
            request()->all(),
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        )->validate();

        // Tentativa de autenticação
        if (Auth::attempt(request()->only(['email', 'password']))) {
            return redirect('/dashboard'); // Sucesso, redireciona para o dashboard
        }

        // Se a autenticação falhar, redireciona de volta com a mensagem de erro
        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
