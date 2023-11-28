@extends('master')

@section('content')

<a href="{{ route('contatos.create') }}">Novo</a>

<hr>

<h2>Contatos</h2>

<ul>
    @foreach ($contatos as $contato)
        <li>{{ $contato->nome }} | <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}">Editar</a> | <a href="">Deletar</a> </li>
    @endforeach
</ul>

@endsection