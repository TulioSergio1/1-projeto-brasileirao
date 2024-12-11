<?php
require 'config.php'; // importa o arquivo config.php, que estabelece a conexão com o BD
require_once 'Jogador.php'; // importa o arquivo Jogador.php
include 'Clube.php'; // importa o arquivo Clube.php

$clube_obj = new Clube($conn); // cria um objeto da classe Clube, que recebe uma conexão do BD
$clubes = $clube_obj->get_clubes(); // chama o método get_clubes(), que retorna informações do BD

$jogador_obj = new Jogador($conn); // cria um objeto da classe Jogador, que recebe uma conexão do BD

// Excluir jogador
if (isset($_POST['excluir'])) {
    $nome = $_POST['nome'];
    $jogador_obj->remover_jogador($nome);
    header("location:q1.php");
}

$jogadores = $jogador_obj->get_jogadores(); // chama o método get_jogadores(), que retorna informações do BD
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogadores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css'>
    <link rel="stylesheet" href="./style.css">
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
    <div class="container">
        <h1>Lista de Jogadores</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Clube</th>
                    <th>Posição</th>
                    <th>Idade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop para gerar dinamicamente -->
                <?php foreach ($jogadores as $jogador): ?>
                    <tr>
                        <td><?= htmlspecialchars($jogador['nome']); ?></td>
                        <td><?= htmlspecialchars($jogador['clube']); ?></td>
                        <td><?= htmlspecialchars($jogador['posicao']); ?></td>
                        <td><?= htmlspecialchars($jogador['idade']); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="nome" value="<?= htmlspecialchars($jogador['nome']); ?>">
                                <button type="submit" name="excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
