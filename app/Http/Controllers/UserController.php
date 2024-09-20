<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\USer;

class UserController extends Controller
{
    public function index()
    {
        $funcionarios = User::all();
        return view('dashboard.funcionarios', compact('funcionarios'));
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

    public function edit($id)
    {
        $funcionario = User::where('cpf', $id)->firstOrFail();

        return view('modal.funcionario-edit', compact('funcionario'));
    }

    public function update(Request $request)
    {

        $funcionario = User::all();

        User::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Fucionario atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = User::findOrFail($id);

        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('sucesso', 'Funcionario excluido com sucesso');
    
}

}
