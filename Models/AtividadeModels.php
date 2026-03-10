<?php

class AtividadeModels {
    public $idatividade;
    public $rows;
    public $nome, $orientacoes, $setor_tramitacao, $tarefas_idtarefas, $tarefas;

    public function save(){
        include_once __DIR__ . '/../DAO/AtividadeDAO.php';
        $dao = new AtividadeDAO();

        if (!empty($this->idatividade)) {
            $dao->update($this);
        } else {
            $dao->insert($this);
        }
    }

    public function getAllRows(){
        include_once __DIR__ . '/../DAO/AtividadeDAO.php';
        $dao = new AtividadeDAO();
       
        $this->rows = $dao->select();
    }

    public function getById(int $id){
        include_once __DIR__ . '/../DAO/AtividadeDAO.php';
        $dao = new AtividadeDAO();
        return $dao->selectById($id) ?? new AtividadeModels();
    }

    public function delete(int $id){
        include_once __DIR__ . '/../DAO/AtividadeDAO.php';
        $dao = new AtividadeDAO();
        $dao->delete($id);
    }

    public function getTarefas(){
        include_once __DIR__ . '/../DAO/AtividadeDAO.php';
        $dao = new AtividadeDAO();
        return $dao->selectTarefas();
    }
    public function getMediadores()
{
    include 'DAO/UsuarioDAO.php';

    $dao = new UsuarioDAO();

    return $dao->getMediadores();
}
}
?>
