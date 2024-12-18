<?php

require 'config.php'; // Conecta ao banco de dados
include 'Jogador.php'; 
include 'valida_dados.php';
$jogador_obj = new Jogador($conn);
$sucesso;

if (isset($_POST['cadastrar'])) {
    // Coleta as informações do formulário
    $nome = valida_dados($_POST['nome']);
    $idade = valida_dados($_POST['idade']);
    $clube = valida_dados($_POST['clube']);
    $posicao = valida_dados($_POST['posicao']);


    // Valida se a idade é um número e está dentro de um intervalo razoável
    if (!filter_var($idade, FILTER_VALIDATE_INT) || $idade < 15 || $idade > 50) {
        $mensagem = "A idade deve ser um número entre 15 e 50.";
    } 
    else {
        // Inserção dos dados no banco de dados
        $sucesso = $jogador_obj->insere_jogador($nome, $idade, $clube, $posicao);
        if ($sucesso === true) {
            $mensagem = "Jogador cadastrado com sucesso!";
        } else {
            $mensagem = "Falha ao cadastrar jogador. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css'>
    <link rel="stylesheet"  href="css/style.css">
    <title>Cadastro de Jogador</title>
</head>
<body>
    <div class="navbar">
        <div class="brand">Brasileirão Série A</div>
        <div>
            <a href="pag_cadastro.php">Adicionar Jogador</a>
            <a href="pag_clubes.php">Clubes</a>
            <a href="pag_jogadores.php">Jogadores</a>
        </div>
    </div>

    <div class="container-box">
        <div class="box-container-cadastro">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" required>
                </div>
                <div class="form-group">
                    <label for="clube">Clube:</label>
                    <input type="text" id="clube" name="clube" required>
                </div>
                <div class="form-group">
                    <label for="posicao">Posição:</label>
                    <input type="text" id="posicao" name="posicao" required>
                </div>
                <div class="form-group">
                    <?php 
                        if (isset($mensagem)) {
                            echo "<p>$mensagem</p>";
                        }
                    ?>
                </div>
                <button type="submit" name="cadastrar">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>