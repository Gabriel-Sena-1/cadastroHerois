<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../view/css/home.css">
    <style>
        .card {
            max-width: 300px;
            border-radius: 0.5rem;
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid transparent;
        }

        .content {
            padding: 1.1rem;
        }

        .image {
            object-fit: cover;
            width: 100%;
            height: 150px;
            background-color: rgb(239, 205, 255);
        }

        .title {
            color: #111827;
            font-size: 1.125rem;
            line-height: 1.75rem;
            font-weight: 600;
        }

        .desc {
            margin-top: 0.5rem;
            color: #6B7280;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .action {
            display: inline-flex;
            margin-top: 1rem;
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            align-items: center;
            gap: 0.25rem;
            background-color: #2563EB;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .action span {
            transition: .3s ease;
        }

        .action:hover span {
            transform: translateX(4px);
        }
    </style>

    <script type="text/javascript" src="./../view/favorita.js"></script>

    <?php
    require_once('./../model/Heroi.class.php');
    if (isset($msg)) {
        echo '<script>';
        echo "alert('$msg')";
        echo '</script>';
    }
    unset($msg);
    ?>
</head>

<body>

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
                            <a class="nav-link active" aria-current="page" action="list"
                                href="./../controller/heroi.ctrl.php?act=list">Listagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" action="cad"
                                href="./../controller/heroi.ctrl.php?act=cad">Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>