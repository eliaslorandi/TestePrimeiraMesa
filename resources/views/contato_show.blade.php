@extends('layouts.master')

@section('title', 'Detalhes do Contato')

@section('content')

    <h2>Contato - {{ $contato->nome }} </h2>

    <hr>
    @if(isset($endereco))
        
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
@else
    <p>Este contato não possui um endereço cadastrado.</p>
@endif

    <form action="{{ route('contatos.destroy', ['contato' => $contato->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

    <hr>

@endsection

