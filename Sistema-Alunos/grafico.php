<?php
// Inclui a classe Sistema.php
include_once 'class/Sistema.php';

// Configurações do banco de dados
$host = "localhost";
$dbname = "escola";
$user = "root";
$password = "";

// Cria uma instância da classe Sistema e conecta ao banco
$sistema = new Sistema();
$sistema->conectar($host, $dbname, $user, $password);

// Obtém a conexão PDO
$conn = $sistema->getPdo();

// Consultar os dados dos alunos
$sql = "SELECT aluno, media, situacao FROM vw_boletins";
$result = $conn->query($sql);

// Arrays para armazenar os dados do gráfico
$alunos = [];
$medias = [];
$cores = [];

if ($result && $result->rowCount() > 0) {
    // Coletar dados e determinar a cor para cada aluno
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $alunos[] = $row['aluno'];
        $medias[] = $row['media'];
        
        // Definir a cor com base na situação do aluno
        switch ($row['situacao']) {
            case 'Aprovado':
                $cores[] = 'green';  // Cor verde para aprovado
                break;
            case 'Reprovado':
                $cores[] = 'red';    // Cor vermelha para reprovado
                break;
            case 'Recuperação':
                $cores[] = 'yellow'; // Cor amarela para recuperação
                break;
            default:
                $cores[] = 'gray';   // Cor cinza para casos não definidos
                break;
        }
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Situação dos Alunos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#f5f5f5;
        }

        h1 {
            text-align: left;
            margin: 20px;
            display: inline-block;
        }

        .button-container {
            float: right;
            margin-top: 20px;
        }

        button {
            background-color:#007BFF; /* Cor verde */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:#0056b3; /* Cor verde escuro ao passar o mouse */
        }

        canvas {
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
        }

        .container {
            margin: 0 auto;
            width: 80%;
            max-width: 1000px;
        }

        /* Adicionando um pouco de espaçamento */
        .title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Gráfico de Situação dos Alunos</h1>
            <div class="button-container">
                <a href="index02.php">
                    <button>Voltar para o Início</button>
                </a>
            </div>
        </div>
        
        <canvas id="grafico" width="400" height="200"></canvas>

        <script>
            // Dados passados do PHP para o JavaScript
            var alunos = <?php echo json_encode($alunos); ?>;
            var medias = <?php echo json_encode($medias); ?>;
            var cores = <?php echo json_encode($cores); ?>;

            var ctx = document.getElementById('grafico').getContext('2d');
            var grafico = new Chart(ctx, {
                type: 'bar', // Tipo de gráfico
                data: {
                    labels: alunos, // Nomes dos alunos
                    datasets: [{
                        label: 'Média dos Alunos',
                        data: medias, // Notas médias dos alunos
                        backgroundColor: cores, // Cores baseadas na situação do aluno
                        borderColor: 'black',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    plugins: {
                        tooltip: {
                            backgroundColor: '#444',
                            titleColor: '#fff',
                            bodyColor: '#fff'
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>
