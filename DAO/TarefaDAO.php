<?php
class TarefaDAO{
    private $conexao;


    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(TarefaModels $model){
        $sql = "INSERT INTO tarefa (fase_curso, doc_modelo) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->fase_curso);
        $stmt->bindValue(2, $model->doc_modelo);

        $stmt->execute();
    }
    public function update(TarefaModels $model){
        $sql = "UPDATE tarefa SET fase_curso=?, doc_modelo=?  WHERE idtarefa=?";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->fase_curso);
        $stmt->bindValue(2, $model->doc_modelo);
        $stmt->bindValue(3, $model->idtarefa);

        
        $stmt->execute();
    }
    public function  select(){
        $sql = "SELECT * FROM tarefa";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function delete(int $id){
        $sql = "DELETE FROM tarefa WHERE idtarefa = ?";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function selectById(int $idtarefa){
        include_once 'Models/TarefaModels.php';

        $sql = "SELECT * FROM tarefa WHERE idtarefa = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $idtarefa);
        $stmt->execute();

        return $stmt->fetchObject("TarefaModels");
    }
}

?> 