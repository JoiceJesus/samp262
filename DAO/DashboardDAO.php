<?php

class DashboardDAO {
    private $conexao;
public function getAtividadesRecentes($limite = 5)
{
    

    $sql = "SELECT idatividade, nome, setor_tramitacao 
        FROM atividade
        ORDER BY idatividade DESC
        LIMIT 5";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function getTotais() {
        $sql = "
            SELECT
                (SELECT COUNT(*) FROM curso) AS total_cursos,

                (SELECT COUNT(*) FROM tarefa) AS total_tarefas,

                (SELECT COUNT(*) 
                 FROM mediador_tarefa 
                 WHERE status = 'concluida') AS tarefas_concluidas,

                (SELECT COUNT(*) FROM atividade) AS total_atividades
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
