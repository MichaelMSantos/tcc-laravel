<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::paginate(10);

        return view('pages.fornecedores', compact('fornecedores'));
    }
    public function store(Request $request)
    {
        $fornecedores = new Fornecedor;

        $fornecedores->id = $request->id;
        $fornecedores->nome = $request->nome;
        $fornecedores->telefone = $request->telefone;
        $fornecedores->endereco = $request->endereco;
        $fornecedores->whatsapp = $request->whatsapp;

        $fornecedores->save();

        return back()->with('sucesso', 'Fornecedor registrada com sucesso');
    }

    public function update(Request $request)
    {

        $fornecedor = Fornecedor::all();

        Fornecedor::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Fornecedor atualizada com sucesso!');
    }


    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->delete();

        return redirect()->route('fornecedor.index')->with('sucesso', 'Fornecedor excluido com sucesso!');
    }
}
