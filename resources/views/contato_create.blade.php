@extends('layouts.master')

@section('title', 'Criar Contato')

@section('content')
    <h2>Criar Contato</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <div>
        <form action="/contatos" method="POST">
            <div class="form-novo-contato">
                <input type="hidden" name="_method" method="GET">
                <input type="text" id="nome" name="nome" placeholder="nome">
                <input type="text" name="numero_celular" placeholder="Celular">
                <input type="text" name="email" placeholder="email">
                <!--<input type="text" name="cep">
                        <input type="text" name="rua">
                        <input type="text" name="numero">
                        <input type="text" name="complemento">
                        <input type="text" name="bairro">
                        <input type="text" name="cidade">
                        <input type="text" name="estado">-->
                <input type="text" name="nota">
            </div>
            <button type="submit"> Cadastrar </button>
        </form>
    </div>

@endsection
