<?php
class CursosDAO{
    private $conexao;


    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function insert(CursosModels $model){
        $sql = "INSERT INTO curso (nome, nivel, inicio_semestre, coordenador, telefone, oferta, email, pedagogo, sipac, coordenador_tutoria_idcoordenador_tutoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->nivel);
        $stmt->bindValue(3, $model->inicio_semestre);
        $stmt->bindValue(4, $model->coordenador);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->oferta);
        $stmt->bindValue(7, $model->email);
        $stmt->bindValue(8, $model->pedagogo);
        $stmt->bindValue(9, $model->sipac);
        $stmt->bindValue(10, $model->coordenador_tutoria_idcoordenador_tutoria);
        

        $stmt->execute();
    }
    public function update(CursosModels $model){
        $sql = "UPDATE curso SET nome=?, nivel=?, inicio_semestre=?, coordenador=?, telefone=?, oferta=?, email=?, pedagogo=?, sipac=?, coordenador_tutoria_idcoordenador_tutoria=?  WHERE idcurso=?";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->nivel);
        $stmt->bindValue(3, $model->inicio_semestre);
        $stmt->bindValue(4, $model->coordenador);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->oferta);
        $stmt->bindValue(7, $model->email);
        $stmt->bindValue(8, $model->pedagogo);
        $stmt->bindValue(9, $model->sipac);
        $stmt->bindValue(10, $model->coordenador_tutoria_idcoordenador_tutoria);
        $stmt->bindValue(11, $model->idcurso);

        
        $stmt->execute();
    }
    public function  select(){
        $sql = "SELECT * FROM curso";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public function delete(int $id){
        $sql = "DELETE FROM curso WHERE idcurso = ?";
       
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
    public function selectById(int $idcurso){
        include_once 'Models/CursosModels.php';

        $sql = "SELECT * FROM curso WHERE idcurso = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $idcurso);
        $stmt->execute();

        return $stmt->fetchObject("CursosModels");
    }
}

?> 