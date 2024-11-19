<?php
require 'config.php'; // importa o arquivo config.php, que estabelece a conexão com o BD
include 'clubes.php'; // importa o arquivo Clube.php

$clube_obj = new clubes($conn); // cria um objeto da classe Clube, que recebe uma conexão do BD
$clubes = $clube_obj->get_clubes(); // chama o método get_clubes(), que retorna informações do BD
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Brasileirão Série A</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="navbar">
    <div class="brand">Brasileirão Série A</div>
    <div>
      <a href="#banco-de-dados">Banco de dados</a>
      <a href="#clubes">Clubes</a>
      <a href="#jogadores">Jogadores</a>
      <a href="#estatísticas">Estatísticas</a>
    </div>
  </div>

  <!-- Slide Container -->
  <div class="slide-container">
    <div class="wrapper">

      <!-- Loop para gerar cards dinamicamente -->
      <?php foreach ($clubes as $clube): ?>
        <div class="card">
          <div class="clash-card__image">
            <!-- Usa imagem padrão se não houver imagem no banco -->
            <img src="<?= htmlspecialchars($clube['img'] ?? 'imagem_padrão.png'); ?>" alt="<?= htmlspecialchars($clube['nome']); ?>" />
          </div>
          <div class="clash-card__unit-name"><?= htmlspecialchars($clube['nome']); ?></div>
          <div class="clash-card__unit-description">
            Fundado em <?= htmlspecialchars($clube['ano_fundacao']); ?>
          </div>
          <div class="clash-card__unit-stats clearfix">
            <div class="one-third">
              <div class="stat"><?= htmlspecialchars($clube['ano_fundacao']); ?></div>
              <div class="stat-value">Ano</div>
            </div>
            <div class="one-third">
              <div class="stat"><?= htmlspecialchars($clube['estadio']); ?></div>
              <div class="stat-value">Estádio</div>
            </div>
            <div class="one-third no-border">
              <div class="stat"><?= htmlspecialchars($clube['estado']); ?></div>
              <div class="stat-value">Estado</div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div> <!-- end wrapper -->
  </div> <!-- end container -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>
  <script src="./script.js"></script>
</body>
</html>
