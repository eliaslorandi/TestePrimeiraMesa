@extends('layouts.master')

@section('title', 'Editar Contato')

@section('content')
    <h2>Editar Contato</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{ route('contatos.update', ['contato' => $contato->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="nome" value="{{ $contato->nome }}">
        <input type="text" name="numero_celular" value="{{ $contato->numero_celular }}">
        <input type="text" name="email" value="{{ $contato->email }}">
        <!--<input type="text" name="cep" value="{{ $contato->cep }}">
        <input type="text" name="rua" value="{{ $contato->rua }}">
        <input type="text" name="numero" value="{{ $contato->numero }}">
        <input type="text" name="complemento" value="{{ $contato->complemento }}">
        <input type="text" name="bairro" value="{{ $contato->bairro }}">
        <input type="text" name="cidade" value="{{ $contato->cidade }}">
        <input type="text" name="estado" value="{{ $contato->estado }}">
        <input type="text" name="nota" value="{{ $contato->nota }}">-->
        <button type="submit"> Alterar </button>
    </form>
@endsection
