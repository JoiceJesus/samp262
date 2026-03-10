<?php

class MediadorPedagogicoModels {
    public $idmediador_pedagogico;
    public $rows;
    public $nome, $email, $telefone, $coordenador_tutoria_idcoordenador_tutoria;

    public function save(){
        include 'DAO/MediadorPedagogicoDAO.php';
        $dao = new MediadorPedagogicoDAO();

        if (!empty($this->idmediador_pedagogico)) {
        $dao->update($this);
        } else {
        $dao->insert($this);
    }
    }
    public function getAllRows(){
        include 'DAO/MediadorPedagogicoDAO.php';

        $dao = new MediadorPedagogicoDAO();

        $this->rows = $dao->select();
    }
    public function getById(int $id){
        include 'DAO/MediadorPedagogicoDAO.php';
        
        $dao = new MediadorPedagogicoDAO();
        $obj = $dao->selectById($id);
        
        //igual ao if
        return ($obj) ? $obj : new MediadorPedagogicoModels();

    }
    public function delete(int $id){
        include 'DAO/MediadorPedagogicoDAO.php';

        $dao = new MediadorPedagogicoDAO();
        $dao->delete($id);
    }
}
?>