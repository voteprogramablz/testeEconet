@extends('layouts.default')

@section('title', 'Pedidos | Listar')

@section('content')
    <h1 class="text-center mb-4 text-dark">Pedidos cadastrados</h1>


    <div class="w-75 p-3 mx-auto rounded" style="background-color: #eee;">
        <div class="d-flex justify-content-between ">
            <div>
                <button onclick="window.location='{{ route('order.create') }}'"class="btn btn-success">Novo</button>
            </div>
            <form class="d-flex  mb-5 w-25" method="get" action="{{ route('order.search') }}">
                @csrf
                <input class="form-control me-3" type="text" name="search" placeholder="Filtrar">
                <button class="btn btn-secondary" type="submit">Filtrar</button>
            </form>
        </div>
        <table class="container-xl">
            @forelse ($orders as $order)
                @if ($loop->first)
                    <tr class="row fs-5 mb-3">
                        <th class="col-sm text-center">
                            Cliente
                        </th>
                        <th class="col-sm text-center">
                            Produto
                        </th>
                        <th class="col-sm text-center">
                            Quantidade
                        </th>
                        <th class="col-sm text-center">
                        </th>
                    </tr>
                @endif
                <tr class="row pb-2 pt-2 border-bottom border-bottom-1 border-gray-900">
                    <td class="col-sm">
                        {{ $order->client->name }}
                    </td>
                    <td class="col-sm">
                        {{ $order->product->title }}
                    </td>
                    <td class="col-sm text-center">
                        {{ $order->quantity }}
                    </td>
                    <td class="d-flex col-sm text-center">
                        <form method="post" action="/pedidos/delete/{{ $order->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger delete-btn me-4" type="submit"><i
                                    class="fas fa-trash me-3 "></i>Deletar</button>
                        </form>
                        <button class="btn btn-primary "><a class="text-light"
                                href="/pedidos/visualizar/{{ $order->id }}"><i
                                    class="fas fa-edit text-light me-2"></i>Editar</a></button>
                    </td>
                </tr>
            @empty
                <h2>Pedidos não encontrados, cadastre um novo ou altere a pesquisa</h2>
            @endforelse
        </table>
        <div>
            {{ $orders->appends([
                    'search' => request()->get('search', ''),
                ])->links() }}
        </div>
    </div>

@endsection
