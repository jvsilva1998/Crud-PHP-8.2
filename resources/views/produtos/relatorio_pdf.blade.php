<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 120px;
        }

        h1 {
            font-size: 20px;
            margin: 0;
            color: #2c3e50;
            text-align: right;
            flex: 1;
        }

        p.data {
            font-size: 11px;
            color: #666;
            margin-top: 0;
        }

        .filtros {
            margin-top: 10px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f1f1f1;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            margin-top: 30px;
            color: #888;
        }

        footer {
            margin-top: 100px;
            font-size: 11px;
            color: #777;
            text-align: center;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo">
        <div>
            <h1>📄 Relatório de Produtos</h1>
            <p class="data">Gerado em: {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </header>

    <div class="filtros">
        <strong>Filtros aplicados:</strong> Nenhum filtro (todos os produtos).
    </div>

    @if ($produtos->count())
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 60%;">Nome</th>
                    <th style="width: 30%;">Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Total:</td>
                    <td>R$ {{ number_format($total, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    @else
        <p class="no-data">Nenhum produto encontrado para exibição.</p>
    @endif

    <footer>
        Este relatório foi gerado automaticamente pelo sistema em {{ now()->format('d/m/Y H:i') }}.
        <br>
        __________________________ <br>
        Assinatura responsável
    </footer>

</body>
</html>
