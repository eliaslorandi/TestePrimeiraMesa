@extends('layouts.master')

@section('title', 'Editar Contato')

@section('content')
    <div class="container mt-4">
        <h2>Editar Contato</h2>

        <form action="{{ route('contatos.update', ['contato' => $contato->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" class="form-control" placeholder="Digite o nome completo" value="{{ $contato->nome }}">
            </div>

            <div class="form-group">
                <label for="numero_celular">Celular</label>
                <input type="text" name="numero_celular" class="form-control" placeholder="(99) 99999-9999" value="{{ $contato->numero_celular }}" data-mask="(00) 00000-0000">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Digite o email" value="{{ $contato->email }}">
            </div>

            <!-- Endereço -->
            <br>
            <div class="endereco">
                <h3>Endereço</h3>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" placeholder="Digite o CEP" value="{{ $contato->endereco->cep ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" class="form-control" placeholder="Digite a rua" value="{{ $contato->endereco->rua ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" class="form-control" placeholder="Digite o número" value="{{ $contato->endereco->numero ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" placeholder="Digite o complemento" value="{{ $contato->endereco->complemento ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control" placeholder="Digite o bairro" value="{{ $contato->endereco->bairro ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade" value="{{ $contato->endereco->cidade ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" class="form-control" placeholder="Digite o estado" value="{{ $contato->endereco->estado ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nota">Nota</label>
                <input type="text" name="nota" class="form-control" placeholder="Adicione uma nota" value="{{ $contato->nota }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
@endsection


