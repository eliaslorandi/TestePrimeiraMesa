@extends('layouts.master')

@section('title', 'Página Inicial')

@section('content')

    <h2>Agenda Telefônica</h2>

    @guest
        <p>Faça Login para ter acesso à lista de contatos.</p>
    @else
        <p>Você está logado!</p>
    @endguest

@endsection
