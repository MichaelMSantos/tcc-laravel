<?php

namespace App\Http\Controllers;

use App\Models\Tecido;
use Illuminate\Http\Request;
use App\Rules\UniqueCodigo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TecidoController extends Controller
{
    public function index()
    {
        $tecidos = Tecido::all();

        return view('dashboard.estoque.tecidos', ['tecidos' => $tecidos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['nullable', new UniqueCodigo],
            'medida' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer'
        ]);

        if (empty($request->codigo)) {
            $number = mt_rand(1000000000, 9999999999);

            while ($this->productCodeExists($number)) {
                $number = mt_rand(1000000000, 9999999999);
            }

            $codigo = $number;
        } else {
            $codigo = $request->codigo;

            if ($this->productCodeExists($codigo)) {
                return back()->withErrors(['codigo' => 'O código já existe. Escolha outro.']);
            }
        }

        $tecidos = new Tecido();

        $tecidos->id = $request->id;
        $tecidos->codigo = $codigo;
        $tecidos->medida = $request->medida;
        $tecidos->cor = $request->cor;
        $tecidos->quantidade = $request->quantidade;

        $barcodeUrl = "https://barcode.tec-it.com/barcode.ashx?data={$tecidos->codigo}&code=Code128&translate-esc=on&filetype=png";

        $response = Http::get($barcodeUrl);

        if ($response->successful()) {
            $path = 'barcodes/' . $tecidos->codigo . '.png';

            Storage::disk('public')->put($path, $response->body());


            $tecidos->barcode_image = $path;
            $tecidos->save();
        }

        return back()->with('sucesso', 'Tecido registrado com sucesso');
    }

    public function productCodeExists($number)
    {
        return Tecido::where('codigo', $number)->exists();
    }

    public function edit($id)
    {
        $tecido = Tecido::where('codigo', $id)->firstOrFail();

        return view('modal.estoque.tecido-edit', compact('tecido'));
    }
    public function update(Request $request)
    {

        $request->validate([
            'codigo' => ['required', new UniqueCodigo],
            'medida' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer'
        ]);

        $tecido = Tecido::all();

        Tecido::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Tecido atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tecido = Tecido::findOrFail($id);

        $tecido->delete();

        return redirect()->route('tecido.index')->with('sucesso', 'Produto excluido com sucesso');
    }
}
