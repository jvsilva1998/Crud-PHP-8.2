@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        @include('produtos._form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
