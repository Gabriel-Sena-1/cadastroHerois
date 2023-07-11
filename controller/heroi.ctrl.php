<?php
require('./../model/Imagem.class.php'); //inclui classe que armazena imagem
require('./../model/Heroi.class.php');
require('./../model/Database.class.php');

function removeCaracteresProibidos($texto)
{
    $texto = addcslashes($texto, "--");
    return addslashes(strip_tags($texto));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['act']) && $_POST['act'] === 'cad') {
        $path_imagem_salva = ImagemPHP::salvaImagem('imagem'); // Salva a imagem
        /* Remove caracteres proibidos antes de salvar no banco de dados 
         * Caracteres proibidos incluem trechos de comandos de banco de dados */
        $nome = removeCaracteresProibidos($_POST['nome']);
        $descricao = removeCaracteresProibidos($_POST['desc']);
        /* ----------------------------------------------------------------- */

        // Verifica se os campos do cadastro estao vindo vazios por post
        if ($nome == '' || empty($nome) || $descricao == '' || empty($descricao)) {
            $msg = 'Preencha todos os campos';
        } else {

            // Instancia e salva o objeto heroi no banco de dados
            $heroi = new Heroi($nome, $descricao, $path_imagem_salva);

            $heroiCadastrar = $heroi->salvar($heroi);

            $msg = 'Herói salvo com sucesso!';
            include('./../view/header.php');
            include('./../view/listagem.php');
            include('./../view/footer.php');
        }
    }


} else if (!empty($_GET['act']) && $_GET['act'] === 'favoritar') {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        $deu = Heroi::favoritar($id);

    } else {
        $msg = 'ID NAO ENCONTRADO';
    }
} else if (!empty($_GET['act']) && $_GET['act'] === 'desfavoritar') {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        $deu = Heroi::desfavoritar($id);
    } else {
        $msg = 'ID NAO ENCONTRADO';
    }
} else if (isset($_GET['act']) && $_GET['act'] == 'delete') { //excluir
    if (!isset($_GET['id'])) {
        die('Id não informado');
    }

    $id = $_GET['id'];
    $deuCerto = Heroi::deletar($id);


    if ($deuCerto) {
        $msg = 'Herói excluído com sucesso!';
        include('./../view/header.php');
        include('./../view/listagem.php');
        include('./../view/footer.php');
    } else {
        $msg = 'Deu ruim.';
        include('./../view/header.php');
        include('./../view/cadastro.php');
        include('./../view/footer.php');
    }



} else if (isset($_GET['act']) && $_GET['act'] == 'cad') { //abre novo cadastro (mostrar)

    include('./../view/header.php');
    include('./../view/cadastro.php');
    include('./../view/footer.php');

} else if (isset($_GET['act']) && $_GET['act'] == 'list') { //abre nova lista (mostrar)

    include('./../view/header.php');
    include('./../view/listagem.php');
    include('./../view/footer.php');

} else {
    echo 'pior q nem rodou o codigo';
}