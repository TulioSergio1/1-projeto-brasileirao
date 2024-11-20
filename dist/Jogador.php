<?php

/**
 * Classe para realizar operações com informações de jogadores.
 */
class Jogador
{

    private $mysql;

    /**
     * Método responsável por criar um objeto do tipo Jogador.
     * 
     * @param $mysql uma conexão ao BD.
     * 
     * @return um objeto do tipo Jogador.
     */
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }


    /**
     * Método responsável por retornar informações de jogadores do BD.
     * 
     * @param Nenhum parâmetro de entrada.
     * 
     * @return array informações de jogadores do BD.
     */
    public function get_jogadores(): array
    {
        // String da consulta para o BD
        $sql = 'SELECT nome, idade, posicao, clube FROM jogadores';

        // Consulta no BD
        $resultado = $this->mysql->query($sql);

        // Retorna um array associativo
        $jogadores = $resultado->fetch_all(MYSQLI_ASSOC);

        return $jogadores;
    }
}
