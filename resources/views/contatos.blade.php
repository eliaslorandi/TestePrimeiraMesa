@extends('layouts.master')

@section('title', 'Agenda Telefônica')

@section('content')

    {{-- <a href="{{ route('home') }}"> Início </a>
    <br>
    <a href="{{ route('contatos.create') }}"> Novo Contato </a> --}}

    <div class="collapse navbar-collapse" id="navbar">
    <a href="{{ route('contatos.create') }}" class="navbar-brand"> Novo Contato </a>
    </div>

    <div id="search-container" class="">
        <h1>Busca</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
            <button type="submit">Filtrar</button>
        </form>
    </div>
<br>
    <div>
        <ul>
            @foreach ($contatos as $contato)
            <div class="Lista-contatos">
                <li>{{ $contato->nome }} | <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}" >Editar</a> |
                                           <a href="{{ route('contatos.show', ['contato' => $contato->id]) }}" >Detalhes</a>
                </li>
            </div>
            @endforeach
        </ul>
    </div>

@endsection
