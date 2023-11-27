@extends('master')

@section('content')

<h2>Contatos</h2>

<ul>
    @foreach ($contatos as $contato)
        <li>{{ $contato->nome }}</li>
    @endforeach
</ul>

@endsection