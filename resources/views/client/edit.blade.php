@extends('layouts.default')

@section('title', 'Clientes | Atualizar')

@section('content')
    <h1 class="text-center mb-4">Atualizar cliente</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/clientes/atualizar/{{ $client->id }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Nome </label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $client->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $client->cpf }}"
                    maxlength="14">
            </div>
            <button class="d-block btn btn-primary" type="submit">Atualizar</button>
        </form>
    </div>

@endsection
