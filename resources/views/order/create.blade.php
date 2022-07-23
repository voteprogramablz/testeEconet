@extends('layouts.default')

@section('title', 'Pedidos | Cadastro')

@section('content')
    <h1 class="text-center mb-4">Cadastrar pedido</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/pedidos/cadastro">
            @csrf
            <p>Cliente</p>
            <select class="form-select" name="client_id" id="client_id"
                aria-label="Campo para selecionar um cliente para o pedido">
                @forelse ($clients as $client)
                    @if ($loop->first)
                        <option selected>Selecione um cliente</option>
                    @endif
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @empty
                    <option selected>Não há clientes cadastrados</option>
                @endforelse
            </select>
            <p class="mt-3">Produto</p>
            <select class="form-select" name="product_id" id="product_id"
                aria-label="Campo para selecionar um produto para o pedido">
                @forelse ($products as $product)
                    @if ($loop->first)
                        <option selected>Selecione um produto</option>
                    @endif
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @empty
                    <option selected>Não há produtos cadastrados</option>
                @endforelse
            </select>
            <div class="mb-3">
                <label for="quantity" class="form-label mt-3">Quantidade</label>
                <input min="1" type="number" name="quantity" class="form-control" id="quantity" value="1">
            </div>
            <input type="hidden" name="order_status_id" id="order_status_id" value="1">
            <button class="btn btn-primary" type="submit">Solicitar</button>
        </form>
    </div>
@endsection
