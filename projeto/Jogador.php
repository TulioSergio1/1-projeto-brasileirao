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

    /**
     * Método responsável por excluir um jogador do BD pelo nome.
     * 
     * @param string $nome Nome do jogador a ser excluído.
     * 
     * @return bool true em caso de sucesso, false em caso de falha.
     */
    public function remover_jogador(string $nome): void
    {
        // código com prepare e bind, que evita SQL injection.
        $sql = "DELETE FROM `jogadores` WHERE `nome` = ?";
        $stmt = $this->mysql->prepare($sql);
            
        // configura parâmetros e executa a query
        $stmt->bind_param("s", $nome);
            
        $stmt->execute();
        $stmt->close();
        $this->mysql->close();
    }

    public function insere_jogador($nome, $idade, $clube, $posicao): bool
    {
        // código com prepare e bind, que evita SQL injection.
        $sql = "INSERT INTO jogadores (nome, idade, clube, posicao) VALUES (?, ?, ?, ?)";
        $stmt = $this->mysql->prepare($sql);

        // verifica se o prepare() foi bem-sucedido
        if (!$stmt) {
            return false;
        }

        // configura parâmetros e executa a query
        $stmt->bind_param("siss", $nome, $idade, $clube, $posicao);
        $status = $stmt->execute();

        // verifique se o execute() foi bem-sucedido
        if (!$status) {
            return false;
        }

        $stmt->close();
        $this->mysql->close();
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
        #### Implemente aqui o método de editar jogador  ####
        #                                                #
        #                                                #
        #                                                #
        ##################################################

        return true;
    }
}
