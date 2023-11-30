@extends('layouts.master')

@section('title', 'Agenda Telefônica')

@section('content')

<h1>Lista de Contatos</h1>
<div class="botao-novo-contato">
    <a href="{{ route('contatos.create') }}" class="btn btn-primary">Novo Contato</a>
</div>

<div class="Lista-contatos">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>
                        <a href="{{ route('contatos.edit', ['contato' => $contato->id]) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('contatos.show', ['contato' => $contato->id]) }}" class="btn btn-info">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

