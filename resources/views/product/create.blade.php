@extends('layouts.default')

@section('title', 'Produtos | Cadastro')

@section('content')
    <h1>Cadastro de produtos</h1>
    <form method="post" action="/produto/cadastro">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Nome </label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preço unitário</label>
            <input type="number" name="price" class="form-control" id="price" min="0">
        </div>
        <div class="mb-3">
            <label for="barcode" class="form-label">Código de Barras</label>
            <input type="number" name="barcode" class="form-control" id="barcode" min="0">
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
@endsection
