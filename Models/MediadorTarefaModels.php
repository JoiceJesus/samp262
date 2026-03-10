<?php

class MediadorTarefaModels
{
    public $mediador, $curso, $atividade, $status;

    public $rows;

    public function save()
{
    include 'DAO/MediadorTarefaDAO.php';
    $dao = new MediadorTarefaDAO();

    $existe = $dao->selectById($this->mediador, $this->curso);

    if ($existe) {
        $dao->update($this);
    } else {
        $dao->insert($this);
    }
}
    public function getAllRows() {
        include 'DAO/MediadorTarefaDAO.php';
        $dao = new MediadorTarefaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $mediador, int $curso){
        include 'DAO/MediadorTarefaDAO.php';
        $dao = new MediadorTarefaDAO();

        $obj = $dao->selectById($mediador, $curso);
        return ($obj) ? $obj : new MediadorTarefaModels();
    }

    public function delete(int $mediador, int $curso)
    {
        include 'DAO/MediadorTarefaDAO.php';
        $dao = new MediadorTarefaDAO();

        $dao->delete($mediador, $curso);
    }
}
