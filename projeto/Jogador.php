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
        $sql = 'SELECT id, nome, idade, posicao, clube FROM jogadores';

        // Consulta no BD
        $resultado = $this->mysql->query($sql);

        // Retorna um array associativo
        $jogadores = $resultado->fetch_all(MYSQLI_ASSOC);

        return $jogadores;
    }

    public function get_jogador_id($id): array
    {
        // String da consulta para o BD
        $sql = "SELECT * FROM `jogadores` WHERE id = $id";

        // Consulta no BD
        $resultado = $this->mysql->query($sql);

        // Retorna um array associativo
        $jogador = $resultado->fetch_array(MYSQLI_ASSOC);


        return $jogador;
    }

    public function insere_jogador($nome, $idade, $clube, $posicao): bool
    {
        $sql = "INSERT INTO jogadores (nome, idade, clube, posicao) VALUES
        (?, ?, ?, ?)";
        $stmt = $this->mysql->prepare($sql);

        // configura parâmetros e executa a query
        $stmt->bind_param("siss", $nome, $idade, $clube, $posicao);
        $stmt->execute();
        $stmt->close();
        $this->mysql->close();

        return true;
    }

    /**
     * Método responsável por excluir um jogador do BD pelo id.
     * 
     * @param string $id id do jogador a ser excluído.
     * 
     * @return sem retorno.
     */
    public function remove_jogador($id) : bool {
        $sql = "DELETE FROM `jogadores` WHERE `jogadores`.`id` = ?";
        $stmt = $this->mysql->prepare($sql);
            
        // configura parâmetros e executa a query
        $stmt->bind_param("i", $id);
            
        $stmt->execute();
        $this->mysql->close();// código com prepare e bind, que evita SQL injection.
        return true;
    }


    /**
     * Edita as informações de um jogador no banco de dados.
     *
     * @param int $id O ID do jogador a ser editado.
     * @param string $nome O novo nome do jogador.
     * @param int $idade A nova idade do jogador.
     * @param string $clube O novo clube do jogador.
     * @param string $posicao A nova posição do jogador.
     *
     * @return bool Retorna true se a edição for bem-sucedida e false caso contrário.
     */
    public function edita_jogador($id, $nome, $idade, $clube, $posicao): bool
    {
        // Cria a consulta preparada com parâmetros marcados como placeholders (?)
        $sql = "UPDATE `jogadores` SET `nome` = ?, `idade` = ?, `clube` = ?, `posicao` = ? WHERE `jogadores`.`id` = ?";

        // Prepara a consulta
        $stmt = $this->mysql->prepare($sql);

        // Verifica se o prepare() foi bem-sucedido
        if (!$stmt) {
            return false;
        }

        // Vincula os parâmetros aos placeholders na consulta preparada
        $stmt->bind_param("sissi", $nome, $idade, $clube, $posicao, $id);

        // Executa a consulta preparada
        $status = $stmt->execute();

        // Verifica se o execute() foi bem-sucedido
        if (!$status) {
            return false;
        }

        $stmt->close();
        return true;
    }
}
