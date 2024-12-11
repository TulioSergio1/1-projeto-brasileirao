<?php
require 'config.php'; // Conecta ao banco de dados
include 'Jogador.php'; 
include 'valida_dados.php';
$jogador_obj = new Jogador($conn);
$sucesso = false;

if (isset($_POST['cadastrar'])) {
    // Coleta as informações do formulário
    $nome = valida_dados($_POST['nome']);
    $idade = valida_dados($_POST['idade']);
    $clube = valida_dados($_POST['clube']);
    $posicao = valida_dados($_POST['posicao']);

    // Verifica se os campos não estão vazios
    if (empty($nome) || empty($idade) || empty($clube) || empty($posicao)) {
        echo "Todos os campos são obrigatórios.";
    } 
    // Valida se a idade é um número e está dentro de um intervalo razoável
    elseif (!filter_var($idade, FILTER_VALIDATE_INT) || $idade < 15 || $idade > 50) {
        echo "A idade deve ser um número entre 15 e 50.";
    } 
    else {
        // Inserção dos dados no banco de dados
        $sucesso = $jogador_obj->insere_jogador($nome, $idade, $clube, $posicao);        
        if ($sucesso) {
            echo "Novo jogador cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css'>
    <link rel="stylesheet" href="./style.css">
    <title>pagina_de_cadastro</title>
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
                    <input type="text" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade">
                </div>
                <div class="form-group">
                    <label for="clube">Clube:</label>
                    <input type="text" id="clube" name="clube">
                </div>
                <div class="form-group">
                    <label for="posicao">Posição:</label>
                    <input type="text" id="posicao" name="posicao">
                </div>
                <button type="submit" name="cadastrar">Enviar</button>
            </form>
        </div>
    </div>

</body>
</html>