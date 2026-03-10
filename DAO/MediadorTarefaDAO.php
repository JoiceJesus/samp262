<?php

class MediadorTarefaDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(MediadorTarefaModels $model)
    {
        $sql = "INSERT INTO mediador_tarefa (mediador, curso, atividade, status) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->mediador);
        $stmt->bindValue(2, $model->curso);
        $stmt->bindValue(3, $model->atividade);
        $stmt->bindValue(4, $model->status);

        $stmt->execute();
    }

    public function update(MediadorTarefaModels $model)
    {
        $sql = "UPDATE mediador_tarefa SET atividade = ?, status = ? WHERE mediador = ? AND curso = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->atividade);
        $stmt->bindValue(2, $model->status);
        $stmt->bindValue(3, $model->mediador);
        $stmt->bindValue(4, $model->curso);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM mediador_tarefa";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $mediador, int $curso)
    {
        include_once 'Models/MediadorTarefaModels.php';

        $sql = "SELECT * FROM mediador_tarefa WHERE mediador = ? AND curso = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $mediador);
        $stmt->bindValue(2, $curso);
        $stmt->execute();

        return $stmt->fetchObject("MediadorTarefaModels");
    }

    public function delete(int $mediador, int $curso)
    {
        $sql = "DELETE FROM mediador_tarefa WHERE mediador = ? AND curso = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $mediador);
        $stmt->bindValue(2, $curso);
        $stmt->execute();
    }
}
