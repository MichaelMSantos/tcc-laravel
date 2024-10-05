@extends('relatorios.layout_pdf');

@section('content')
    <p>Total de camisetas: {{ $camisetas->count() }}</p>
    <p>Pouco estoque: {{ $countCamiseta = DB::table('camisetas')->where('quantidade', '<=', 5)->count() }}</p>
    <p>Sem estoque: {{ $semCamiseta = DB::table('camisetas')->where('quantidade', '<', 1)->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Modelo</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Fornecedor</th>
                <th>Data de entrada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camisetas as $camiseta)
                <tr>
                    <th scope="row">{{ $camiseta->codigo }}</th>
                    <th>{{ $camiseta->modelo }}</th>
                    <th>{{ $camiseta->tamanho }}</th>
                    <th>{{ $camiseta->cor }}</th>
                    <th>{{ $camiseta->quantidade }}</th>
                    <th>{{ $camiseta->categoria }}</th>
                    <th>
                        @if ($camiseta->fornecedor)
                            {{ $camiseta->fornecedor->nome }}
                        @else
                            N/A
                        @endif
                    </th>
                    <th>{{ $camiseta->created_at }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
