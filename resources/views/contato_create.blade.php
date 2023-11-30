@extends('layouts.master')

@section('title', 'Criar Contato')

@section('content')
    <h2>Novo Contato</h2>

    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif

    <div id="form-novo-contato">
        <form action="{{ route('contatos.store') }}" method="POST">
            <div class="form-novo-contato">
                @csrf

                <!-- Informações Pessoais -->
                <div>
                    <label for="nome">Nome Completo*</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo">
                </div>
                <div>
                    <label for="numero_celular">Celular*</label>
                    <input type="text" name="numero_celular" required placeholder="99 99999 9999"
                        data-mask="(00) 00000-0000">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Digite seu email">
                </div>

                <!-- Endereço -->
                <br>
                <div class="endereco">
                    <h3>Endereço</h3>
                    <div>
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" placeholder="12345-678" data-mask="00000-000">
                    </div>
                    <div>
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" placeholder="Digite o nome da rua">
                    </div>
                    <div>
                        <label for="numero">Número</label>
                        <input type="text" name="numero" placeholder="Número da residência">
                    </div>
                    <div>
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" placeholder="Complemento (opcional)">
                    </div>
                    <div>
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" placeholder="Digite o bairro">
                    </div>
                    <div>
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" placeholder="Digite a cidade">
                    </div>
                    <div>
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" placeholder="Digite o estado">
                    </div>
                </div>

                <!-- Nota -->
                <div>
                    <label for="nota">Nota</label>
                    <input type="text" name="nota" placeholder="Adicione uma nota">
                </div>

            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>


@endsection
