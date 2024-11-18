<?php

    include_once('Sistema.php');//importando a classe sistema

    $sistema = new Sistema;

    $host = "localhost";//host do banco
    $dbname = "escola";//nome do banco
    $user = "root";//usuário do banco
    $password = "";//senha do banco

    try {
        $sistema->conectar($host, $dbname, $user, $password);
    } catch (Exception $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
?>
