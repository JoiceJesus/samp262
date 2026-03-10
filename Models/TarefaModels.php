<?php

class TarefaModels {
    public $idtarefa;
    public $rows;
    public $fase_curso, $doc_modelo;

    public function save(){
        include 'DAO/TarefaDAO.php';
        $dao = new TarefaDAO();

        if (!empty($this->idtarefa)) {
        $dao->update($this);
        } else {
        $dao->insert($this);
    }
    }
    public function getAllRows(){
        include 'DAO/TarefaDAO.php';

        $dao = new TarefaDAO();

        $this->rows = $dao->select();
    }
    public function getById(int $id){
        include 'DAO/TarefaDAO.php';
        
        $dao = new TarefaDAO();
        $obj = $dao->selectById($id);
        
        //igual ao if
        return ($obj) ? $obj : new TarefaModels();

    }
    public function delete(int $id){
        include 'DAO/TarefaDAO.php';

        $dao = new TarefaDAO();
        $dao->delete($id);
    }
}
?>