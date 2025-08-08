<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>
@stack('scripts')
<body id="bodymain">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="/img/icons8-pasta-50.png" alt="">
            @auth
                <p class="saudação-usuario">Olá, {{ Auth::user()->name }}</p>
            @endauth
            <a href="/" class="navbar-brand"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-mian">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Inicio</a>
                    </li>
                    @auth
                        @if(strtolower(auth()->user()->recrutador) === 'sim')
                            <li class="nav-item">
                                <a href="/create" class="nav-link">Cadastrar Vaga</a>
                            </li>
                            <li class="nav-item">
                                <a href="/vagasIndividual" class="nav-link">Minhas Vagas</a>
                            </li>
                        @elseif(strtolower(auth()->user()->recrutador) === 'não')
                                <li class="nav-item">
                                    <a href="{{ route('candidaturas.minhas') }}" class="nav-link">Minhas Candidaturas</a>
                                </li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/cadastrar" class="nav-link">Cadastrar-se</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="main-footer">
        <p>&copy; 2025</p>
    </footer>
    <script type = "módulo"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>