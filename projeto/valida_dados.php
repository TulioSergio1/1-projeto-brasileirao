<?php
// Função para validar dados do formulário contra HTML injection
function valida_dados($dados)
{
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}