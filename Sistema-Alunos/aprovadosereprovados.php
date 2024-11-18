<?php
// Inclui o arquivo Sistema.php
include_once('class/Sistema.php');

// Cria uma instância da classe Sistema
$sistema = new Sistema;

// Configurações do banco de dados
$host = "localhost";
$dbname = "escola";
$user = "root";
$password = "";

// Conecta ao banco de dados
$sistema->conectar($host, $dbname, $user, $password);

// Obtém a conexão
$conn = $sistema->getPdo();

// Verifica se a conexão foi estabelecida corretamente
if (!$conn) {
    die("Erro: A conexão com o banco de dados não foi estabelecida.");
}

// Consulta ao banco de dados
$sql = "SELECT aluno, media, situacao FROM vw_boletins";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta ao banco de dados: " . $conn->errorInfo()[2]);
}

// Inicializa os arrays de aprovados, reprovados e recuperação
$aprovados = [];
$reprovados = [];
$recuperacao = [];

// Verifica se há resultados
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Classifica os alunos conforme a situação
        switch ($row['situacao']) {
            case 'Aprovado':
                $aprovados[] = $row;
                break;
            case 'Reprovado':
                $reprovados[] = $row;
                break;
            case 'Recuperação':
                $recuperacao[] = $row;
                break;
            default:
                // Nenhuma ação para situações não definidas
                break;
        }
    }
} else {
    die("Nenhum dado encontrado no banco de dados.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados dos Boletins</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: left;
            margin: 20px;
        }
        h2 {
            text-align: left;  /* Alinhando os títulos à esquerda */
            margin-left: 150px; /* Ajustando a margem para alinhar com a tabela */
            margin-top: 50px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000000;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        /* Estilo para o botão de voltar */
        .voltar-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .voltar-btn:hover {
            background-color: #0056b3;
        }
        /* Cor para cada situação */
        .aprovado {
            background-color: green;
            color: white;
        }
        .reprovado {
            background-color: red;
            color: white;
        }
        .recuperacao {
            background-color: yellow;
            color: black;
        }
    </style>
</head>
<body>
    <!-- Botão de voltar -->
    <a href="index02.php"><button class="voltar-btn">Voltar para a Página Inicial</button></a>

    <h1>Resultados dos Boletins</h1>

    <!-- Tabela de Aprovados -->
    <h2>Aprovados</h2>
    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aprovados as $aluno): ?>
                <tr class="aprovado">
                    <td><?= $aluno['aluno'] ?></td>
                    <td><?= $aluno['media'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tabela de Reprovados -->
    <h2>Reprovados</h2>
    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reprovados as $aluno): ?>
                <tr class="reprovado">
                    <td><?= $aluno['aluno'] ?></td>
                    <td><?= $aluno['media'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tabela de Recuperação -->
    <h2>Recuperação</h2>
    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recuperacao as $aluno): ?>
                <tr class="recuperacao">
                    <td><?= $aluno['aluno'] ?></td>
                    <td><?= $aluno['media'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
