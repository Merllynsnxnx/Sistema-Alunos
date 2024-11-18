<?php

class Login {
    private $connection;

    public function __construct($host, $dbname, $user, $password) {
        $this->connection = new mysqli($host, $user, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $this->connection->connect_error);
        }
    }

    public function autenticar($username, $password) {
        // Escapa os valores para segurança
        $username = mysqli_real_escape_string($this->connection, $username);
        $password = mysqli_real_escape_string($this->connection, $password);

        // Consulta SQL
        $sql = "SELECT id FROM superior WHERE username = '$username' AND password = '$password'";
        $result = $this->connection->query($sql);

        if ($result && $result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
        // Fecha a conexão automaticamente
        $this->connection->close();
    }
}
?>
