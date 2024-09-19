<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;


class FornecedorController extends Controller
{
   public function index()
   {
      $fornecedor = Fornecedor::all();

      return view('dashboard.fornecedores', ['fornecedores' => $fornecedor]);
   }
   public function store(Request $request)
   {
      $fornecedores = new Fornecedor;

      $fornecedores->id = $request->id;
      $fornecedores->nome = $request->nome;
      $fornecedores->telefone = $request->telefone;
      $fornecedores->endereco = $request->endereco;
      $fornecedores->contato = $request->contato;

      $fornecedores->save();

      return back()->with('sucesso', 'fornecedor registrada com sucesso');
   }

   public function edit($id)
   {
      $fornecedor = Fornecedor::where('nome', $id)->firstOrFail();

      return view('dashboard.estoque.modal.fornecedor-edit', compact('fornecedor'));
   }

   public function update(Request $request)
   {

      $fornecedor = Fornecedor::all();

      Fornecedor::findOrFail($request->id)->update($request->all());


      return back()->with('sucesso', 'fornecedor atualizada com sucesso!');
   }


   public function destroy($id)
   {
      $fornecedor = Fornecedor::findOrFail($id);

      $fornecedor->delete();

      return redirect()->route('fornecedor.index')->with('sucesso', 'funcionario excluido com sucesso');
   }

}
