@extends('layouts.master')

@section('title', 'Página Inicial')

@section('content')

<h2>HOME</h2>

<hr>

<a href="{{ route('contatos.index') }}"> Lista de Contatos </a>

<hr>

<h2>Agenda Telefônica</h2>

<ul>
    
</ul>


@endsection