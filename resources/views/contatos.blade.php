@extends('layouts.master')

@section('title', 'Agenda Telefônica')

@section('content')


<a href="{{ route('contatos.create') }}"> Novo Contato </a>
<h1> Lista de Contatos</h1>

    {{-- <div class="collapse navbar-collapse" id="navbar">
    <a href="{{ route('contatos.create') }}" class="navbar-brand"> Novo Contato </a>
    </div> --}}
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
