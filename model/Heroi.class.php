<?php

class Heroi
{
    private $id;
    private $nome;
    private $descricao;
    private $path_imagem;

    //cria construtor para o objeto herói
    public function __construct($nome, $descricao, $path_imagem)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->path_imagem = $path_imagem;
    }

    //cria getters para todos os atributos do objeto
    public function __get($name)
    {
        return $this->$name;
    }

    //cria setters para todos os atributos
    public function __set($name, $value)
    {
        if (property_exists('Heroi', $name)) {
            $this->$name = $value;
        } else {
            throw new Exception("Propriedade não existe");
        }
    }

    // Não foi utilizado
    public static function buscarPorId($id)
    {
        $con = Database::conecta();

        try {
            $sqlBuscarHeroi = ("SELECT * FROM heroi WHERE id = :id");
            $stmt = $con->prepare($sqlBuscarHeroi);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            $heroi = $stmt->fetch();
            if (!empty($heroi) || $heroi != '') {
                return $heroi;
            } else { //linha igual a nulo, ou seja nada encontrado
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    //TODO: Listar
    public static function listarHeroi()
    {
        $con = Database::conecta();
        try {
            $stmt = $con->prepare('SELECT * FROM heroi');
            $stmt->execute();

            $herois = array();
            while ($linha = $stmt->fetch()) {
                $heroi = new Heroi(
                    $linha['nome'],
                    $linha['descricao'],
                    $linha['path_imagem']
                );
                $heroi->id = $linha['id'];
                $herois[] = $heroi;
            }

            return $herois;
        } catch (PDOException $erro) {
            echo 'Não foi possível listar os heróis.';
            $erro->getMessage();
            return false;
        }
    }

//TODO: Construindo o HTML da listagem, utilizando responsividade 
    public static function listarHeroiGaleria()
    {
        if (Heroi::listarHeroi() == false) {
            echo "<div style=\"text-align: center;\">";
            echo "<h1>Não existem heróis registrados.</h1>";
            echo "</div>";
        } else {
            foreach (Heroi::listarHeroi() as $heroi) {
                echo " 
            <div class=\"card\" style=\"margin: 2vh; text-align: center;\">
                <div class=\"image\" style=\"text-align: center;\"><img src=" . $heroi->path_imagem . " class=\"card-img-top\" alt=\"Imagem\" style=\"width: 150px;\"></div>
                <div class=\"content\">
                <span class=\"title\" id=\"favoritar\" onclick=\"" . "FavoritarClick($heroi->id, this);alert('Ação feita com sucesso!');" . "\">
                    $heroi->nome
                </span>

            <p class=\"desc\">
                $heroi->descricao
            </p>
                <input hidden id=\"nomeHeroi\" value=\"$heroi->nome\"></input>
                <input hidden id=\"inputId\" value=\"$heroi->id\"></input>
                <a href=\"./../controller/heroi.ctrl.php
                ?act=delete&id={$heroi->id}\" class=\"btn btn-danger\" class=\"action\">
                Excluir
                </a>
            </div>
            </div>
            ";
            }
        }
    }


//TODO: Salvar
    public static function salvar($heroi)
    {
        $con = Database::conecta();
        try {
            //prepara sql
            $stmt = $con->prepare('INSERT INTO heroi(nome, descricao, path_imagem, fav)
                                    VALUES(:nome,:descr, :img, :fav)');
            //insere parametros
            $stmt->bindValue(':nome', $heroi->nome);
            $stmt->bindValue(':descr', $heroi->descricao);
            $stmt->bindValue(':img', $heroi->path_imagem);
            $stmt->bindValue(':fav', 'false');

            $heroi = $stmt->execute();

        } catch (PDOException $erro) {
            echo 'Não foi possível cadastrar o herói.';
            $erro->getMessage();
        }
    }

    //     public static function favoritar($heroi)
// {
//     $con = Database::conecta();
//     try {
//         // Prepara a SQL
//         $stmt = $con->prepare('UPDATE heroi
//             SET nome = :nome, fav = :fav
//             WHERE id = :id');

    //         // Insere os parâmetros
//         $stmt->bindValue(':nome', '&#11088 '.$heroi->nome);
//         $stmt->bindValue(':fav', true);
//         $stmt->bindValue(':id', $heroi->id);

    //         // Executa a consulta
//         $stmt->execute();

    //     } catch (PDOException $erro) {
//         echo 'Não foi possível favoritar o herói.';
//         $erro->getMessage();
//     }
// }


//TODO: Favoritar
    public static function favoritar($id)
    {
        $con = Database::conecta();
        try {
            // Prepara a SQL
            $stmt = $con->prepare('UPDATE heroi
            SET fav = :fav
            WHERE id = :id');

            // Insere os parâmetros
            $stmt->bindValue(':fav', 'true');
            $stmt->bindValue(':id', $id);

            // Executa a consulta
            return $stmt->execute();

        } catch (PDOException $erro) {
            echo 'Não foi possível favoritar o herói: ' . $erro->getMessage();
        }
    }

    public static function desfavoritar($id)
{
    $con = Database::conecta();
    try {
        
        // Update para desfavoritar, dando update para retirar a tag da estrelinha
        // Também faz update no atributo "fav" do banco de dados, que diz se o herói é
        // favoritado ou não
        $query = "UPDATE heroi
        SET fav = :fav
        WHERE id = :id";
        // Prepara a SQL
        $stmt = $con->prepare($query);

        // Insere o parâmetro
        $stmt->bindValue(':fav', 'false');
        $stmt->bindValue(':id', $id);

        // Executa a consulta
        return $stmt->execute();

    } catch (PDOException $erro) {
        echo 'Não foi possível desfavoritar o herói: ' . $erro->getMessage();
    }
}



    //TODO: Excluir
    public static function deletar($id)
    {
        try {
            $con = Database::conecta();
            $stmt = $con->prepare("DELETE FROM heroi WHERE id=:id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();

        } catch (PDOException $e) {
            die("Erro ao excluir o herói!" . $e->getMessage());
        }
    }
}







