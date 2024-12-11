<?php
require 'config.php'; // Conecta ao banco de dados
include 'Clube.php'; // Inclui a classe Clube

$clube_obj = new Clube($conn); // Cria um objeto da classe Clube
$clubes = $clube_obj->get_clubes(); // Obtém informações dos clubes
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Brasileirão Série A</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css">
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

  <!-- Slide Container -->
  <div class="slide-container">
    <div class="wrapper">

      <!-- Loop para gerar cards dinamicamente -->
      <?php foreach ($clubes as $clube): ?>
        <div class="card">
          <div class="img-container"> 
            <img src="<?= htmlspecialchars($clube['img'] ?? 'imagem_padrão.png'); ?>" alt="<?= htmlspecialchars($clube['nome']); ?>" />
          </div>
          <div class="clash-card__unit-name"><?= htmlspecialchars($clube['nome']); ?></div>
          <div class="clash-card__unit-description">
            O mascote do clube é o <?= htmlspecialchars($clube['mascote']); ?>
          </div>
          <div class="clash-card__unit-stats clearfix">
            <div class="one-third">
              <div class="stat"><?= htmlspecialchars($clube['ano_fundacao']); ?></div>
              <div class="stat-value">Fundação</div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.wrapper').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
  </script>
</body>
</html>
