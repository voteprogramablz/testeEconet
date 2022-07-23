@extends('layouts.default')

@section('title', 'Pedidos | Atualizar')

@section('content')
    <h1 class="text-center mb-4">Atualizar pedido</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/pedidos/atualizar/{{ $order->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="client_id">Cliente</label>
                <select disabled class="form-select" name="client_id" id="client_id"
                    aria-label="Campo para selecionar um cliente para o pedido">
                    <option checked value="{{ $order->client->id }}">{{ $order->client->name }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="product_id">Produto</label>
                <select disabled class="form-select" name="product_id" id="product_id"
                    aria-label="Campo para selecionar um produto para o pedido">
                    <option checked value="{{ $order->product->id }}">{{ $order->product->title }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity">Quantidade</label>
                <select disabled class="form-select" name="quantity" id="quantity"
                    aria-label="Campo para selecionar a quantidade de produtos para o pedido">
                    <option checked value="{{ $order->quantity }}">{{ $order->quantity }}</option>
                </select>
            </div>
            <label for="status_id">Status</label>
            <select class="form-select" name="order_status_id" id="order_status_id"
                aria-label="Campo para selecionar um produto para o pedido">
                @foreach ($orderStatuses as $status)
                    <option {{ $status->id === $order->order_status_id ? 'selected' : '' }} value="{{ $status->id }}">
                        {{ $status->title }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="dateCreated" class="form-label">Data da compra</label>
                <input disabled type="text" name="dateCreated" class="form-control" id="dateCreated"
                    value="{{ $order->created_at_for_humans }}" maxlength="16">
            </div>
            <button class="d-block btn btn-primary" type="submit">Atualizar</button>
        </form>
    </div>

@endsection
