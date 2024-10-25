<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Seção</th>
                <th scope="col">Qtd</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @if (count($recentes) > 0)
                @foreach ($recentes as $recent)
                    <tr>
                        <td>{{ $recent->codigo }}</td>
                        <td style="text-transform: capitalize">
                            <a href="/dashboard/estoque/{{ $recent->origem }}">{{ $recent->origem }}</a>
                        </td>
                        <td>{{ $recent->quantidade }}</td>
                        <td>{{ $recent->fornecedor ?? 'Fornecedor não registrado' }}</td>
                        <td>{{ \Carbon\Carbon::parse($recent->created_at)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
