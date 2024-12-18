<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do banco de dados
    $host = "localhost";
    $dbname = "escola";
    $user = "root";
    $password = "";

    // Criar conexão com o banco de dados
    $connection = new mysqli($host, $user, $password, $dbname);

    // Verifica se houve erro na conexão
    if ($connection->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $connection->connect_error);
    }

    // Escapa os valores enviados pelo formulário
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Consulta SQL
    $sql = "SELECT id FROM superior WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result && $result->num_rows == 1) {
        session_regenerate_id();
        $_SESSION['username'] = $username;
        header('Location: index02.php');
        exit();
    } else {
        $error = "<h2 class='error'>Seu nome de usuário ou senha está inválido</h2>";
        echo $error;
    }

    // Fechar conexão
    $connection->close();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./assets/icon/briefcase-solid.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Sistema de Banco de Horas</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>
<body>

    <div class="screen">
        
        <div class="forms">
            <h1>Bem-vindo ao Sistema De Notas Escolares,</h1>
            <form action="" method="POST">
                <label for="username">Login</label>
                <br>
                <input type="text" id="username" name="username" placeholder="Insira seu login corporativo">
                <br>
                <label for="password">Senha</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Insira sua senha">
                <br>
                <input type="submit" name="submit" value="Login">
            </form>
        </div>

    </div>
    
</body>
</html>