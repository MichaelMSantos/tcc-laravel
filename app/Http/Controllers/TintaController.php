<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\UniqueCodigo;
use App\Models\Tinta;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TintaController extends Controller
{
    public function index()
    {
        $tintas = Tinta::paginate(5);
        return view('estoque.tinta.index', compact('tintas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'codigo' => ['nullable', new UniqueCodigo],
            'marca' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'capacidade' => 'required'
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


        $tintas = new Tinta;

        $tintas->codigo = $codigo;
        $tintas->marca = $request->marca;
        $tintas->cor = $request->cor;
        $tintas->quantidade = $request->quantidade;
        $tintas->capacidade = $request->capacidade;

        $barcodeUrl = "https://barcode.tec-it.com/barcode.ashx?data={$tintas->codigo}&code=Code128&translate-esc=on&filetype=png";

        $response = Http::get($barcodeUrl);

        if ($response->successful()) {
            $path = 'barcodes/' . $tintas->codigo . '.png';

            Storage::disk('public')->put($path, $response->body());


            $tintas->barcode_image = $path;
            $tintas->save();
        }

        return back()->with('sucesso', 'Tinta registrada com sucesso');
    }

    public function productCodeExists($number)
    {
        return Tinta::where('codigo', $number)->exists();
    }

    public function edit($id)
    {
        $tinta = Tinta::where('codigo', $id)->firstOrFail();

        return view('estoque.tinta.tinta-update', compact('tinta'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'codigo' => ['required', 'unique:tintas,codigo,' . $request->id],
            'marca' => 'required',
            'cor' => 'required',
            'quantidade' => 'required|integer',
            'capacidade' => 'required'
        ]);

        $tinta = Tinta::all();

        Tinta::findOrFail($request->id)->update($request->all());


        return back()->with('sucesso', 'Tinta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tinta = Tinta::findOrFail($id);

        $tinta->delete();

        return back()->with('sucesso', 'Produto excluido com sucesso');
    }

    public function pdfGeral()
    {
        $camisetas = Tinta::all();

        $pdf = PDF::loadView('relatorios.camiseta-geral_pdf', [
            'camisetas' => $camisetas,
        ]);

        return $pdf->stream('camiseta-relatorio.pdf');
    }

    public function unicoPdf($codigo)
    {
        $tecido = Tinta::where('codigo', $codigo)->firstOrFail();

        $pdf = PDF::loadView(
            'relatorios.camiseta',
            ['tecido' => $tecido]
        );

        return $pdf->stream('camiseta-relatorio.pdf');
    }
}
