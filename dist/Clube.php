<?php

/**
 * Classe para realizar operações com informações de clubes.
 */
class Clube
{

    private $mysql;

    /**
     * Método responsável por criar um objeto do tipo Clube.
     * 
     * @param $mysql uma conexão ao BD.
     * 
     * @return um objeto do tipo Clube.
     */
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }


    /**
     * Método responsável por retornar informações de clubes do BD.
     * 
     * @param Nenhum parâmetro de entrada.
     * 
     * @return array informações de clubes do BD.
     */



    public function get_clubes(): array
    {
        // String da consulta para o BD
        $sql = 'SELECT nome, ano_fundacao, estado, estadio FROM clubes';

        // Consulta no BD
        $resultado = $this->mysql->query($sql);

        // Retorna um array associativo
        $clubes = $resultado->fetch_all(MYSQLI_ASSOC);

        return $clubes;
    }
}
