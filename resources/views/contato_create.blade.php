@extends('layouts.master')

@section('content')
    <h2>Create</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <form action="{{ route('contatos.create')}}">
        @csrf
        <input type="hidden" name="_method" value="get">
        <input type="text" name="nome">
        <input type="text" name="numero_celular">
        <input type="text" name="email">
        <input type="text" name="cep">
        <input type="text" name="rua">
        <input type="text" name="numero">
        <input type="text" name="complemento">
        <input type="text" name="bairro">
        <input type="text" name="cidade">
        <input type="text" name="estado">
        <input type="text" name="nota">
        <button type="submit"> Cadastrar </button>
    </form>
@endsection
