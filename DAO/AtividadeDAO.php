<?php
class AtividadeDAO{
    private $conexao;


    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(AtividadeModels $model){
        $sql = "INSERT INTO atividade (nome, orientacoes, setor_tramitacao, tarefas_idtarefas) VALUES (?, ?, ?, ?) ";
 
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->orientacoes);
        $stmt->bindValue(3, $model->setor_tramitacao);
        $stmt->bindValue(4, $model->tarefas_idtarefas);
        

        $stmt->execute();
    }
    public function update(AtividadeModels $model){
        $sql = "UPDATE atividade SET nome=?, orientacoes=?, setor_tramitacao=?, tarefas_idtarefas=?  WHERE idatividade=?";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->orientacoes);
        $stmt->bindValue(3, $model->setor_tramitacao);
        $stmt->bindValue(4, $model->tarefas_idtarefas);
        $stmt->bindValue(5, $model->idatividade);
        
        $stmt->execute();
    }
    public function  select(){
        $sql = "SELECT * FROM atividade";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function delete(int $id){
        $sql = "DELETE FROM atividade WHERE idatividade = ?";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function selectById(int $idatividade){
        include_once __DIR__ . '/../Models/AtividadeModels.php';

        $sql = "SELECT * FROM atividade WHERE idatividade = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $idatividade);
        $stmt->execute();

        return $stmt->fetchObject("AtividadeModels");
    }
    //buscar tarefa ja cadastrada no banco, sem usar o id.
    public function selectTarefas()
{
    $sql = "SELECT idtarefa, fase_curso FROM tarefa";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

?> 