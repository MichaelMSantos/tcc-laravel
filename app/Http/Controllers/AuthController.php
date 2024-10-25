<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login()
    {

        validator(
            request()->all(),
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        )->validate();

        if (Auth::attempt(request()->only(['email', 'password']))) {

            return redirect('/dashboard')->with('logado', 'Login efetuado com sucesso');
        }

        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('deslogado', 'Sessão encerrada com sucesso');
    }
}
