@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">📦 Lista de Produtos</h2>
        <div>
            <!-- Botão para exportar PDF -->
            <a href="{{ route('produtos.relatorio.pdf') }}" class="btn btn-outline-danger">
                <i class="fas fa-file-pdf me-2"></i> <span class="d-none d-sm-inline">Exportar PDF</span>
            </a>

            <!-- Botão para abrir o modal de exportação -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportarModal">
                <i class="fas fa-file-export me-2"></i> <span class="d-none d-sm-inline">Exportar</span>
            </button>

            <!-- Botão para abrir o modal de importação -->
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importarModal">
                <i class="fas fa-file-import me-2"></i> <span class="d-none d-sm-inline">Importar Planilha</span>
            </button>

            <!-- Botão para criar um novo produto -->
            <a href="{{ route('produtos.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle me-2"></i> <span class="d-none d-sm-inline">Novo Produto</span>
            </a>
        </div>
    </div>

    <!-- Formulário de busca -->
    <form action="{{ route('produtos.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-10 col-sm-9">
            <input type="text" name="busca" class="form-control" placeholder="Buscar por nome..."
                value="{{ $busca ?? '' }}">
        </div>
        <div class="col-md-2 col-sm-3">
            <button type="submit" class="btn btn-outline-primary w-100">🔍 Buscar</button>
        </div>
    </form>

    @if ($produtos->count())
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ number_format((float) $produto->preco, 2, ',', '.') }}</td>
                            <td class="text-end">
                                <a href="{{ route('produtos.show', $produto) }}" class="btn btn-sm btn-outline-info me-1">👁
                                    Ver</a>
                                <a href="{{ route('produtos.edit', $produto) }}"
                                    class="btn btn-sm btn-outline-warning me-1">✏️ Editar</a>
                                <form action="{{ route('produtos.destroy', $produto) }}" method="POST"
                                    class="d-inline-block"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">🗑 Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        {{ $produtos->appends(['busca' => $busca])->links('paginacao.bootstrap-5') }}
    @else
        <div class="alert alert-warning">
            Nenhum produto encontrado.
        </div>
    @endif

    <!-- Incluir o modal de importação -->
    @include('produtos.modal')

    <!-- Incluir o modal de exportação -->
    @include('produtos.modal_exporta')

@endsection
