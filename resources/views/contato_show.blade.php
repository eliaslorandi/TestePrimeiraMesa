@extends('layouts.master')

@section('title', 'Detalhes do Contato')

@section('content')

    <div class="contact-details">
        <h2>Detalhes do Contato - {{ $contato->nome }} </h2>
        <hr>

            <div class="contact-info">
                <p><strong>Nome:</strong> {{ $contato->nome }}</p>
                <p><strong>Número Celular:</strong> {{ $contato->numero_celular }}</p>
                <p><strong>Email:</strong> {{ $contato->email }}</p>
                <p><strong>CEP:</strong> {{ $endereco->cep }}</p>
                <p><strong>Rua:</strong> {{ $endereco->rua }}</p>
                <p><strong>Número:</strong> {{ $endereco->numero }}</p>
                <p><strong>Complemento:</strong> {{ $endereco->complemento }}</p>
                <p><strong>Bairro:</strong> {{ $endereco->bairro }}</p>
                <p><strong>Cidade:</strong> {{ $endereco->cidade }}</p>
                <p><strong>Estado:</strong> {{ $endereco->estado }}</p>
                <p><strong>Nota:</strong> {{ $contato->nota }}</p>
            </div>

            <form action="{{ route('contatos.destroy', ['contato' => $contato->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir Contato</button>
            </form>

            <hr>
    </div>

@endsection
