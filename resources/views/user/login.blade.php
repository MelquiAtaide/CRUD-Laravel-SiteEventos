<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- CSS do app -->
    <link rel="stylesheet" href="/css/styles.css">

    <!-- script do app -->
    <script src="/js/scripts.js"></script>
</head>
<body>
    <div class="exit-container">
        <a href="{{route('index')}}" class="nav-link">Sair</a>
    </div>
    <div class="login-container">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail cadastrado">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha cadastrada">
            </div>
            <input type="submit" class="btn btn-primary" id="btn-login" value="Enviar">
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
