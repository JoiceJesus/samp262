<?php

class CoordenadorTutoriaModels {
    public $idcoordenador_tutoria;
    public $rows;
    public $nome, $email, $telefone;

    public function save(){
        include 'DAO/CoordenadorTutoriaDAO.php';
        $dao = new CoordenadorTutoriaDAO();

        if (!empty($this->idcoordenador_tutoria)) {
        $dao->update($this);
        } else {
        $dao->insert($this);
    }
    }
    public function getAllRows(){
        include 'DAO/CoordenadorTutoriaDAO.php';

        $dao = new CoordenadorTutoriaDAO();

        $this->rows = $dao->select();
    }
    public function getById(int $id){
        include 'DAO/CoordenadorTutoriaDAO.php';
        
        $dao = new CoordenadorTutoriaDAO();
        $obj = $dao->selectById($id);
        
        //igual ao if
        return ($obj) ? $obj : new CoordenadorTutoriaModels();

    }
    public function delete(int $id){
        include 'DAO/CoordenadorTutoriaDAO.php';

        $dao = new CoordenadorTutoriaDAO();
        $dao->delete($id);
    }
}
?>