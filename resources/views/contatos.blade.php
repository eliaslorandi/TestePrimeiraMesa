@extends('master')

@section('content')

<h2>Contatos</h2>

<ul>
    @foreach ($contatos as $contato)
        <li>{{ $contato->nome }} | <a href="">Editar</a> | <a href="">Deletar</a> </li>
    @endforeach
</ul>

@endsection