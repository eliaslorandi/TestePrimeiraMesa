<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Fonte -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="{{ route('home') }}" class="navbar-brand"> Início </a>
                <a href="{{ route('contatos.index') }}" class="navbar-brand"> Lista de Contatos </a>
                <a href="{{ route('home') }}" class="navbar-brand"> Entrar </a>
                <a href="{{ route('home') }}" class="navbar-brand"> Cadastrar </a>
            </div>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>Teste Agenda Telefônica</p>
        </p>

</body>

</html>
