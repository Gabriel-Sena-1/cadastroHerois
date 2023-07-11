<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/home.css">
    <style>
        #divHome {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 400px;
            margin: auto;
            text-align: center;
            
        }
    </style>
</head>

<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Heros Site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" action="list" href="./../controller/heroi.ctrl.php?act=list">Listagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" action="cad" href="./../controller/heroi.ctrl.php?act=cad">Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<body>
    <div class="container" id="divHome" >
        <h1>Seja bem vindo! Selecione o que deseja fazer.</h1>
        <button><a action="list" href="./../controller/heroi.ctrl.php?act=list">Lista de Heróis</a></button>
        <button><a action="cad" href="./../controller/heroi.ctrl.php?act=cad">Cadastro de Heróis</a></button>
    </div>
</main>
</body>
<footer style="text-align: center;">
    <small>Gabriel Sena - Todos os direitos reservados</small>
</footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>