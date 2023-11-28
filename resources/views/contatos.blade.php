@extends('layouts.master')

@section('title', 'Agenda Telefônica')

@section('content')

    <a href="{{ route('home') }}"> Início </a>
    <br>
    <a href="{{ route('contatos.create') }}"> Novo Contato </a>

    <hr>

    <h2>Lista de Contatos</h2>

    <div id="search-container" class="">
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            <button type="submit">Filtrar</button>
        </form>
    </div>
<br>
    <div>
        <ul>
            @foreach ($contatos as $contato)
                <li>{{ $contato->nome }} | <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}">Editar</a> |
                    <a href="{{ route('contatos.destroy', ['contato' => $contato->id]) }}">Deletar</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
