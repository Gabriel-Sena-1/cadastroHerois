<?php

class Database
{
    //database server name//SE a porta de acesso ao BD não for padrão(5432), informar na string DSN//com port=NRPORTA
    private const DSN = "pgsql:dbname=recdw;host=localhost;port=5432";
    private const BDUSER = 'postgres';
    private const BDPASSWORD = 'postgres';
    static private $conexao = null;

    static function conecta()
    {
        try {
            //conecta ao banco 
            Database::$conexao = 
            new PDO(Database::DSN, Database::BDUSER, Database::BDPASSWORD);
            //quando ocorrer um erro, lançar exceção no PHP
            Database::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $erro) {
            echo 'Não foi possível conectar-se ao BD :( <br>';
            echo $erro->getMessage();
        }
        return Database::$conexao;
    }



}