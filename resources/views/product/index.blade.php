@extends('layouts.default')

@section('title', 'Produtos | Listar')

@section('content')
    <h1 class="text-center mb-4 text-dark">Produtos cadastrados</h1>


    <div class="w-75 p-3 mx-auto rounded" style="background-color: #eee;">
        <div class="d-flex justify-content-between ">
            <div>
                <button onclick="window.location='{{ route('product.create') }}'"class="btn btn-success">Novo</button>
            </div>
            <form class="d-flex  mb-5 w-25" method="get" action="{{ route('product.search') }}">
                @csrf
                <input class="form-control me-3" type="text" name="search" placeholder="Filtrar">
                <button class="btn btn-secondary" type="submit">Filtrar</button>
            </form>
        </div>
        <table class="container-xl">
            @forelse ($products as $product)
                @if ($loop->first)
                    <tr class="row fs-5 mb-3">
                        <th class="col-sm text-center">
                            Nome
                        </th>
                        <th class="col-sm text-center">
                            Preço Unitário
                        </th>
                        <th class="col-sm text-center">
                            Qtd. em estoque
                        </th>
                        <th class="col-sm text-center">
                        </th>
                    </tr>
                @endif
                <tr class="row pb-2 pt-2 border-bottom border-bottom-1 border-gray-900">
                    <td class="col-sm">
                        {{ $product->title }}
                    </td>
                    <td class="col-sm text-center">
                        R$ {{ $product->price_formated }}
                    </td>
                    <td class="col-sm text-center">
                        {{ $product->stock }}
                    </td>
                    <td class="d-flex col-sm text-center">
                        <form method="post" action="/produtos/delete/{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger delete-btn me-4" type="submit"><i
                                    class="fas fa-trash me-3 "></i>Deletar</button>
                        </form>
                        <button class="btn btn-primary "><a class="text-light"
                                href="/produtos/visualizar/{{ $product->id }}"><i
                                    class="fas fa-edit text-light me-2"></i>Editar</a></button>
                    </td>
                </tr>
            @empty
                <h2>Produtos não encontrados, cadastre um novo ou altere a pesquisa</h2>
            @endforelse
        </table>
        <div>
            {{ $products->appends([
                    'search' => request()->get('search', ''),
                ])->links() }}
        </div>
    </div>

@endsection
