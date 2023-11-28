@extends('layouts.master')

@section('title', 'Agenda Telefônica')

@section('content')

<a href="{{ route('contatos.create') }}"> Novo Contato </a>

<hr>

<h2>Agenda Telefônica</h2>

<ul>
    @foreach ($contatos as $contato)
        <li>{{ $contato->nome }} | <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}">Editar</a> | <a href="">Deletar</a> </li>
    @endforeach
</ul>

@endsection