@extends('layouts.default')

@section('title', 'Clientes | Cadastro')

@section('content')
    <h1 class="text-center mb-4">Cadastrar cliente</h1>
    <div class="w-75 pt-4 pb-4 pe-4 ps-4 mx-auto rounded" style="background-color: #eee;">
        <form method="post" action="/clientes/cadastro">
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
                <input type="cpf" name="cpf" class="form-control" id="cpf" max="15">
            </div>
            <button class="d-block btn btn-primary" type="submit">Cadastrar</button>
        </form>
    </div>
    {{-- <script src="{{ asset('js/formValidate.js') }}"></script> --}}
@endsection
