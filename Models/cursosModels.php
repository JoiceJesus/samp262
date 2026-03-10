<?php

class CursosModels {
    public $idcurso;
    public $rows;
    public $nome, $nivel, $inicio_semestre, $coordenador, $telefone, $oferta, $email, $pedagogo, $sipac, $coordenador_tutoria_idcoordenador_tutoria;

    public function save(){
        include 'DAO/CursosDAO.php';
        $dao = new CursosDAO();

        if (!empty($this->idcurso)) {
        $dao->update($this);
        } else {
        $dao->insert($this);
    }
    }
    public function getAllRows(){
        include 'DAO/cursosDAO.php';

        $dao = new cursosDAO();

        $this->rows = $dao->select();
    }
    public function getById(int $id){
        include 'DAO/cursosDAO.php';
        
        $dao = new CursosDAO();
        $obj = $dao->selectById($id);
        
        //igual ao if
        return ($obj) ? $obj : new CursosModels();

    }
    public function delete(int $id){
        include 'DAO/cursosDAO.php';

        $dao = new cursosDAO();
        $dao->delete($id);
    }
}
?>