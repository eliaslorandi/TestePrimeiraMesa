@extends('layouts.master')

@section('title', 'Detalhes do Contato')

@section('content')

    <h2>Contato - {{ $contato->nome }} </h2>

    <hr>

    <p>Nome: {{ $contato->nome }}</p>
    <p>Número Celular: {{ $contato->numero_celular }}</p>
    <p>Email: {{ $contato->email }}</p>
    <p>CEP: {{ $contato->cep }}</p>
    <p>Rua: {{ $contato->rua }}</p>
    <p>Número: {{ $contato->numero }}</p>
    <p>Complemento: {{ $contato->complemento }}</p>
    <p>Bairro: {{ $contato->bairro }}</p>
    <p>Cidade: {{ $contato->cidade }}</p>
    <p>Estado: {{ $contato->estado }}</p>
    <p>Nota: {{ $contato->nota }}</p>

    <form action="{{ route('contatos.destroy', ['contato' => $contato->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    <hr>

@endsection
