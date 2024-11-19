<?php

$nome_servidor = 'localhost';
$nome_usuario = 'root';
$senha = '';
$nome_db = 'brasileiraoDB';

// Cria uma conexão com o BD
$conn = mysqli_connect($nome_servidor, $nome_usuario, $senha, $nome_db);

// Configura o charset do BD
$conn->set_charset('utf8');

// Checa se a conexão foi estabelecida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
//echo "Conectado com sucesso";
