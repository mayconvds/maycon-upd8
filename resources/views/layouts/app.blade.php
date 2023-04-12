<!doctype html>
<html lang="{{ config("app.locale") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upd8</title>
    <link rel="stylesheet" href="{{ asset("site/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("site/css/style.css") }}">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="{{ asset("images/logo/upd8logo-a.png") }}" style="width: 60px"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("site.cadastroform") }}">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("site.usuarios") }}">Usuários</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="content">
    @yield("content")
</main>




<script src="{{ asset("site/jquery.js") }}"></script>
<script src="{{ asset("site/bootstrap.js") }}"></script>
<script src="{{ asset("site/js/scripts.js") }}"></script>
<script src="{{ asset("site/jquery.mask.js") }}"></script>
</body>
</html>
