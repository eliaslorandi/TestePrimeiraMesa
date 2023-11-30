@extends('layouts.master')

@section('title', 'Detalhes do Contato')

@section('content')

    <h2>Contato - {{ $contato->nome }} </h2>

    <hr>

    <p>Nome: {{ $contato->nome }}</p>
    <p>Número Celular: {{ $contato->numero_celular }}</p>
    <p>Email: {{ $contato->email }}</p>
    <p>CEP: {{ $endereco->cep }}</p>
    <p>Rua: {{ $endereco->rua }}</p>
    <p>Número: {{ $endereco->numero }}</p>
    <p>Complemento: {{ $endereco->complemento }}</p>
    <p>Bairro: {{ $endereco->bairro }}</p>
    <p>Cidade: {{ $endereco->cidade }}</p>
    <p>Estado: {{ $endereco->estado }}</p>
    <p>Nota: {{ $contato->nota }}</p>

    <form action="{{ route('contatos.destroy', ['contato' => $contato->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    <hr>

@endsection
