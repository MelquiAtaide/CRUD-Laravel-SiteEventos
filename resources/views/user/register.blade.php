<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- CSS do app -->
    <link rel="stylesheet" href="/css/styles.css">

    <!-- script do app -->
    <script src="/js/scripts.js"></script>
</head>
<body>
    <div class="exit-container">
        <button>
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
            <a href="{{route('index')}}" class="nav-link">Sair</a>
          </button>
    </div>
    <div class="register-conteiner">

        <form action="{{route('user')}}" method="POST">
            @csrf
            <div class="titulo-register">
                <h3>Cadastro</h3>
            </div>
            <div class="form-group">
                <label for="name">Nome Completo:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail">
            </div>
            {{-- <div class="form-group">
                <label for="email">Confirme seu E-mail:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div> --}}
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Crie uma senha">
            </div>
            {{-- <div class="form-group">
                <label for="senha">Confirme sua Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div> --}}
            <input type="submit" class="btn-register" id="btn-register" value="Enviar">
        </form>
    </div>
    <footer>
        <p>MA Eventos &copy; 2022</p>
    </footer>

    {{-- scripts dp bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    {{-- scripts do ionIcons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
