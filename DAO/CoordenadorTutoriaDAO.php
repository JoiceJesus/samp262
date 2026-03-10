<?php
class CoordenadorTutoriaDAO{
    private $conexao;


    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(CoordenadorTutoriaModels $model){
        $sql = "INSERT INTO coordenador_tutoria (nome, email, telefone) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);

        $stmt->execute();
    }
    public function update(CoordenadorTutoriaModels $model){
        $sql = "UPDATE coordenador_tutoria SET nome=?, email=?, telefone=?  WHERE idcoordenador_tutoria = ?";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->idcoordenador_tutoria);

        
        $stmt->execute();
    }
    public function  select(){
        $sql = "SELECT * FROM coordenador_tutoria";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function delete(int $id){
        $sql = "DELETE FROM coordenador_tutoria WHERE idcoordenador_tutoria = ?";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function selectById(int $idcoordenador_tutoria){
        include_once 'Models/CoordenadorTutoriaModels.php';

        $sql = "SELECT * FROM coordenador_tutoria WHERE idcoordenador_tutoria = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $idcoordenador_tutoria);
        $stmt->execute();

        return $stmt->fetchObject("CoordenadorTutoriaModels");
    }
    
}

?> 