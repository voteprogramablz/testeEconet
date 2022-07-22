@extends('layouts.default')

@section('title', 'Produto | Atualizar')

@section('content')
    <h1 class="text-center mb-4">Atualizar produto</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/produtos/atualizar/{{ $product->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Nome </label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}"
                    maxlength="14">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Estoque</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Status</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}">
            </div>
            <button class="btn btn-primary" type="submit">Atualizar</button>
        </form>
    </div>
@endsection
