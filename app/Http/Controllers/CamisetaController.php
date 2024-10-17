<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;

use Illuminate\Http\Request;

use App\Rules\UniqueCodigo;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CamisetaController extends Controller
{

    // Index
    public function index()
    {
        $camisetas = Camiseta::all();
        return view('dashboard.estoque.camisetas', compact('camisetas'));
    }


    // Insert
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['nullable', new UniqueCodigo],
            'modelo' => 'required',
            'tamanho' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'categoria' => 'required'
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

        $camiseta = new Camiseta;

        $camiseta->id = $request->id;
        $camiseta->codigo = $codigo;
        $camiseta->modelo = $request->modelo;
        $camiseta->tamanho = $request->tamanho;
        $camiseta->cor = $request->cor;
        $camiseta->quantidade = $request->quantidade;
        $camiseta->categoria = $request->categoria;

        $camiseta->save();

        $barcodeUrl = "https://barcode.tec-it.com/barcode.ashx?data={$camiseta->codigo}&code=Code128&translate-esc=on&filetype=png";

        $response = Http::get($barcodeUrl);

        if ($response->successful()) {
            $path = 'barcodes/' . $camiseta->codigo . '.png';

            Storage::disk('public')->put($path, $response->body());


            $camiseta->barcode_image = $path;
            $camiseta->save();
        }

        return back()->with('sucesso', 'Camiseta registrada com sucesso.');
    }

    public function productCodeExists($number)
    {
        return Camiseta::where('codigo', $number)->exists();
    }



    // Edit
    public function edit($id)
    {
        $camiseta = Camiseta::where('codigo', $id)->firstOrFail();

        return view('modal.estoque.camiseta-edit', compact('camiseta'));
    }


    // Update
    public function update(Request $request)
    {
        $request->validate([
            'codigo' => ['required', 'unique:camisetas,codigo,' . $request->id],
            'modelo' => 'required',
            'tamanho' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'categoria' => 'required'
        ]);

        $camisetas = Camiseta::all();

        Camiseta::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Camiseta atualizada com sucesso!');
    }

    // Delete
    public function destroy($id)
    {
        $camiseta = Camiseta::findOrFail($id);

        $path = 'barcodes/' . $camiseta->codigo . '.png';

        if (Storage::disk('public')->exists($path)) {

            Storage::disk('public')->delete($path);
        }

        $camiseta->delete();

        return redirect()->route('camiseta.index')->with('sucesso', 'Camiseta excluida com sucesso!');
    }

    public function pdfGeral()
    {
        $camisetas = Camiseta::all();

        $pdf = PDF::loadView('relatorios.camiseta-geral_pdf', [
            'camisetas' => $camisetas,
        ]);

        return $pdf->stream('camiseta-relatorio.pdf');
    }

    public function unicoPdf($codigo)
    {
        $camiseta = Camiseta::where('codigo', $codigo)->firstOrFail();

        $pdf = PDF::loadView(
            'relatorios.camiseta',
            ['camiseta' => $camiseta]
        );

        return $pdf->stream('camiseta-relatorio.pdf');
    }
}
