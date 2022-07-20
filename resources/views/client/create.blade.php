@extends('layouts.default')

@section("title", "Clientes | Cadastro")

@section('content')
    <h1>Cadastro de clientes</h1>
    <form method="post" action="/cliente/cadastro">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome </label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="cpf" name="cpf" class="form-control" id="cpf">
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
@endsection
