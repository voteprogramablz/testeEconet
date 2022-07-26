@extends('layouts.default')

@section('title', 'Produtos | Cadastro')

@section('content')
    <h1 class="text-center mb-4">Cadastrar produtos</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/produtos/cadastro">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nome </label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Preço unitário</label>
                <input type="text" name="price" class="form-control" id="price" min="1">
            </div>
            <div class="mb-3">
                <label for="barCode" class="form-label">Código de Barras</label>
                <input type="number" name="barCode" class="form-control" id="barCode" min="1">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Quantidade em estoque</label>
                <input type="number" name="stock" class="form-control" id="stock" min="0">
            </div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </form>
    </div>
@endsection
