@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        @include('produtos._form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
