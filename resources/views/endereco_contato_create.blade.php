@extends('layouts.master')

@section('title', 'Criar Endereço do Contato')

@section('content')
    <h2>Criar Endereço do Contato</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <div id="form-novo-contato">
        <form action="{{ route('contatos.store') }}" method="POST">
            <div class="form-novo-contato">
                @csrf
                <input type="text" id="nome" name="nome" placeholder="Nome Completo*">
                <input type="text" name="numero_celular" placeholder="Celular*">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="cep" placeholder="CEP">
                <input type="text" name="rua" placeholder="Rua">
                <input type="text" name="numero" placeholder="Número">
                <input type="text" name="complemento" placeholder="Complemento">
                <input type="text" name="bairro" placeholder="Bairro">
                <input type="text" name="cidade" placeholder="Cidade">
                <input type="text" name="estado" placeholder="Estado">
                <input type="text" name="nota" placeholder="Nota">
            </div>
            <button type="submit"> Cadastrar </button>
        </form>
    </div>

@endsection
