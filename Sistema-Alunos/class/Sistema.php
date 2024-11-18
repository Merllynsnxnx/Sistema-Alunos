<?php

class Sistema {
    private $pdo; // Variável de conexão com o banco de dados

    // Função para conectar com o banco de dados
    public function conectar($host, $banco, $usuario, $senha) {
        try { 
            // Criando a conexão PDO
            $this->pdo = new PDO('mysql:host='.$host.';dbname='.$banco, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Definindo o modo de erro para exceção
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage()); // Caso ocorra erro, exibe a mensagem
        }
    }

    // Função que retorna a instância de conexão com o banco de dados
    public function getPdo() {
        return $this->pdo;
    }
}

?>
