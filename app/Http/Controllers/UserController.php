<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\USer;

class UserController extends Controller
{
    public function index()
    {
        $funcionarios = User::all();
        return view('pages.funcionarios', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        $funcionarios = new User;

        $funcionarios->cpf = $request->cpf;
        $funcionarios->nome = $request->nome;
        $funcionarios->email = $request->email;

        $funcionarios->save();

        return back()->with('sucesso', 'Funcionario registrada com sucesso');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users,email,' . $request->id], 
            'cpf' => 'required',
            'name' => 'required',
        ]);

        User::findOrFail($request->id)->update($request->all());

        return back()->with('sucesso', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = User::findOrFail($id);

        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario excluido com sucesso');
    }
}
