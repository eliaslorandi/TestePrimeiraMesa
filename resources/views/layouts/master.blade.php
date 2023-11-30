<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="{{ route('home') }}" class="navbar-brand"> Início </a>
                @guest
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/login" class="nav-link"> Entrar </a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link"> Cadastrar </a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link"> Dashboard </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contatos.index') }}" class="nav-link"> Lista de Contatos </a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="nav-link">
                                @csrf
                                <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();"> Sair </a>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="mt-5">
        <div class="container text-center">
            <p>Teste Agenda Telefônica</p>
        </div>
    </footer>

    <!-- Bootstrap JS (opcional, caso você precise de funcionalidades específicas do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

