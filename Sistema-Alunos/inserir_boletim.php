<?php
    // Mesmo esquema usado na inserção de um aluno
    if(isset($_POST['aluno']) && isset($_POST['disciplina']) && isset($_POST['nota1']) && isset($_POST['nota2']) && isset($_POST['nota3']) && isset($_POST['nota4'])){

        $aluno_id = $_POST['aluno'];
        $disciplina_id = $_POST['disciplina'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $nota4 = $_POST['nota4'];

        include_once('class/Boletim.php');
        include_once('class/Mensagem.php');

        $m = new Mensagem;
        $b = new Boletim;

        // Validação de entrada dos campos de notas
        if($aluno_id != "0" && $disciplina_id != "0" && !empty($nota1) && !empty($nota2) && !empty($nota3) && !empty($nota4)){
            // Verificar se as notas são válidas
            if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && is_numeric($nota4)){
                $msg = $b->valida_boletim($aluno_id, $disciplina_id, $nota1, $nota2, $nota3, $nota4);
                
                if($msg == "válido!"){
                    $b->inserir($aluno_id, $disciplina_id, $nota1, $nota2, $nota3, $nota4);
                    $m->setMensagem("Boletim inserido com sucesso!");
                    header("Location: boletins.php");
                    exit(); // Importante para interromper a execução do script após o redirecionamento
                } else {
                    $m->alert($msg); // Exibe o erro de validação
                }
            } else {
                $m->alert("As notas devem ser numéricas!");
            }
        } else {
            $m->alert("Preencha todos os campos!");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inserir Boletim</title>
    
    <!-- Importando a folha de estilos do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Importando nossa folha de estilos -->
    <link rel="stylesheet" href="css/inserir_boletim.css">
</head>
<body>

    <?php
        include_once('class/Aluno.php');
        include_once('class/Disciplina.php');
        
        $d = new Disciplina;
    ?>

    <!-- Corpo da página -->
    <a href="boletins.php"><h2><<<<</h2></a>
    <div class="container" id="inserir_boletim">
        <form method="POST">
            <input type="hidden" name="operacao" value="3">
            <div id="div_title">
                Inserir boletim
            </div>
            <div id="div_body">
                <div class="form-group">
                    <select class="form-control" id="aluno" name="aluno">
                        <option value="0">--Aluno--</option>
                        <?php
                            $a = new Aluno;
                            $alunos = $a->exibir(0, null, null, 0, 0); // Carregando os alunos
                            // Exibindo os alunos em um select
                            while($aluno = $alunos->fetch()){
                                $selected = (isset($_POST['aluno']) && $_POST['aluno'] == $aluno['matricula']) ? 'selected' : '';
                                echo('<option value="'.$aluno['matricula'].'" '.$selected.'>'.$aluno['aluno'].'</option>');
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="disciplina" name="disciplina">
                        <option value="0">--Disciplina--</option>
                        <?php
                            if(isset($_POST['aluno']) && $_POST['aluno'] != "0"){
                                $registros = $d->aluno_disciplinas($_POST['aluno'], 0, 0); // Carregando disciplinas do aluno
                                while($registro = $registros->fetch()){
                                    $selected = (isset($_POST['disciplina']) && $_POST['disciplina'] == $registro['codigo']) ? 'selected' : '';
                                    echo("<option value='".$registro['codigo']."' ".$selected.">".$registro['nome']."</option>");
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nota1" name="nota1" placeholder="Nota 1" value="<?php echo isset($_POST['nota1']) ? $_POST['nota1'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="nota2" name="nota2" placeholder="Nota 2" value="<?php echo isset($_POST['nota2']) ? $_POST['nota2'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="nota3" name="nota3" placeholder="Nota 3" value="<?php echo isset($_POST['nota3']) ? $_POST['nota3'] : ''; ?>">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="nota4" name="nota4" placeholder="Nota 4" value="<?php echo isset($_POST['nota4']) ? $_POST['nota4'] : ''; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary mb-2" id="inserir">Inserir</button>
            </div>                
        </form>
    </div>

    <!-- Importando o jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Importando nosso JavaScript -->
    <script src="js/inserir_boletim.js"></script>

</body>
</html>