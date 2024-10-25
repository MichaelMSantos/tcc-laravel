<x-relatorio>

    <p>Total de Registros: {{ $totalRegistro }}</p>
    <p>Adições nos Últimos 7 Dias: {{ $adicoesRecentes }}</p>
    <p>Produtos sem Estoque: {{ $semEstoqueTotal }}</p>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Origem</th>
                <th>Quantidade</th>
                <th>Fornecedor</th>
                <th>Data de entrada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recentes as $recent)
                <tr>
                    <td>{{ $recent->codigo }}</td>
                    <td>{{ $recent->origem }}</td>
                    <td>{{ $recent->quantidade }}</td>
                    <td>{{ $recent->fornecedor }}</td>
                    <td>{{ \Carbon\Carbon::parse($recent->created_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-relatorio>
