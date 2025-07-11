@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
    <h1>Detalhes do Produto</h1>

    <p><strong>ID:</strong> {{ $produto->id }}</p>
    <p><strong>Nome:</strong> {{ $produto->nome }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descricao ?? 'Não informada' }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>

    <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
