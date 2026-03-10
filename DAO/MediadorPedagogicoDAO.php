<?php
class MediadorPedagogicoDAO{
    private $conexao;


    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(MediadorPedagogicoModels $model){
        $sql = "INSERT INTO mediador_pedagogico (nome, email, telefone, coordenador_tutoria_idcoordenador_tutoria) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->coordenador_tutoria_idcoordenador_tutoria);
        

        $stmt->execute();
    }
    public function update(MediadorPedagogicoModels $model){
        $sql = "UPDATE mediador_pedagogico SET nome=?, email=?, telefone=?, coordenador_tutoria_idcoordenador_tutoria=?  WHERE idmediador_pedagogico=?";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->coordenador_tutoria_idcoordenador_tutoria);
        $stmt->bindValue(5, $model->idmediador_pedagogico);

        
        $stmt->execute();
    }
    public function  select(){
        $sql = "SELECT * FROM mediador_pedagogico";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function delete(int $id){
        $sql = "DELETE FROM mediador_pedagogico WHERE idmediador_pedagogico = ?";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function selectById(int $idmediador_pedagogico){
        include_once 'Models/MediadorPedagogicoModels.php';

        $sql = "SELECT * FROM mediador_pedagogico WHERE idmediador_pedagogico = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $idmediador_pedagogico);
        $stmt->execute();

        return $stmt->fetchObject("MediadorPedagogicoModels");
    }
}

?> 