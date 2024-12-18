<?php
require 'config.php'; // importa o arquivo config.php, que estabelece a conexão com o BD
require_once 'Jogador.php'; // importa o arquivo Jogador.php
include 'valida_dados.php'; // valida os dados inseridos

$jogador_obj = new Jogador($conn); // cria um objeto da classe Jogador, que recebe uma conexão do BD
$jogadores = $jogador_obj->get_jogadores(); // chama o método get_jogadores(), que retorna informações do BD

// Excluir jogador
if (isset($_POST['remover'])) {
    $id = valida_dados($_POST['id']);
    // Verifica se o jogador foi removido com sucesso
    if ($jogador_obj->remove_jogador($id)) {
        header("Location: pag_jogadores.php?status=success&msg=" . urlencode("Jogador removido com sucesso!"));
        exit; // Garantir que a execução pare após o redirecionamento
    } else {
        header("Location: pag_jogadores.php?status=error&msg=" . urlencode("Erro ao remover o jogador!"));
        exit; // Garantir que a execução pare após o redirecionamento
    }
}

// Verificar mensagens de sucesso/erro
$mensagem = "";
$mensagem_class = "";
if (isset($_GET['status']) && isset($_GET['msg'])) {
    $mensagem = $_GET['msg'];
    $mensagem_class = ($_GET['status'] === "success") ? "alert-success" : "alert-error";
}
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
    <link rel="stylesheet" href="css/style.css">
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

        <!-- Exibição da mensagem de erro ou sucesso -->
        <?php if ($mensagem != ""): ?>
            <div class="alert <?= $mensagem_class; ?>">
                <?= htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Clube</th>
                    <th>Posição</th>
                    <th>Idade</th>
                    <th>Remover</th>
                    <th>Editar</th>
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
                                <input type="hidden" name="id" value="<?= $jogador['id']; ?>">
                                <button type="submit" name="remover">Remover</button>
                            </form>
                        </td>
                        <td>
                            <form method="get" action="pag_editar.php">
                                <input type="hidden" name="id" value="<?= $jogador['id']; ?>">
                                <button type="submit" name="editar">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
