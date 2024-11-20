<?php
    require 'config.php'; // importa o arquivo config.php, que estabelece a conexão com o BD
    require_once 'Jogador.php'; // importa o arquivo Jogador.php
    include 'Clube.php'; // importa o arquivo Clube.php

    $clube_obj = new clubes($conn); // cria um objeto da classe Clube, que recebe uma conexão do BD
    $clubes = $clube_obj->get_clubes(); // chama o método get_clubes(), que retorna informações do BD

    $jogador_obj = new jogadores($conn); // cria um objeto da classe Jogador, que recebe uma conexão do BD
    $jogadores = $jogador_obj->get_jogadores(); // chama o método get_jogadores(), que retorna informações do BD
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogadores</title>
    <link rel="stylesheet" href="jogadores_style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Jogadores do <?= htmlspecialchars($clube['nome']); ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Posição</th>
                    <th>Idade</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop para gerar dinamicamente -->
                <?php foreach ($jogadores as $jogador): ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($jogador['img'] ?? 'imagem_padrão.png'); ?>" alt="Jogador" class="player-img"></td>
                    <td><?= htmlspecialchars($jogador['nome']); ?></td>
                    <td><?= htmlspecialchars($jogador['posicao']); ?></td>
                    <td><?= htmlspecialchars($jogador['clube']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
