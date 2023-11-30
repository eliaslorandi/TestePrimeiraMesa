@extends('layouts.master')

@section('title', 'Criar Contato')

@section('content')
    <div class="container">
        <h2>Novo Contato</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div id="form-novo-contato">
            <form action="{{ route('contatos.store') }}" method="POST">
                <div class="form-novo-contato">
                    @csrf

                    <!-- Informações Pessoais -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo*</label>
                        <input type="text" id="nome" name="nome" required class="form-control"
                            placeholder="Digite seu nome completo">
                    </div>
                    <div class="mb-3">
                        <label for="numero_celular" class="form-label">Celular*</label>
                        <input type="text" name="numero_celular" required class="form-control"
                            placeholder="99 99999 9999" data-mask="(00) 00000-0000">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Digite seu email">
                    </div>
                    <br>
                    <!-- Endereço -->
                    <h3>Endereço</h3>
                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" class="form-control" placeholder="12345-678" data-mask="00000-000">
                    </div>
                    <div class="mb-3">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" name="rua" class="form-control" placeholder="Digite o nome da rua">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" class="form-control" placeholder="Número da residência">
                    </div>
                    <div class="mb-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" name="complemento" class="form-control" placeholder="Complemento (opcional)">
                    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" class="form-control" placeholder="Digite o bairro">
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" name="estado" class="form-control" placeholder="Digite o estado">
                    </div>

                    <!-- Nota -->
                    <div class="mb-3">
                        <label for="nota" class="form-label">Nota</label>
                        <input type="text" name="nota" class="form-control" placeholder="Adicione uma nota">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection
