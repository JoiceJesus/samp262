<?php

class DashboardModel {
    public $total_cursos;
    public $total_atividades;
    public $total_tarefas;
    public $tarefas_concluidas;
     public $atividades_recentes;

    public function getDados() {
        require_once __DIR__ . '/../DAO/DashboardDAO.php';

        $dao = new DashboardDAO();
        $dados = $dao->getTotais();

        $this->total_cursos       = $dados->total_cursos;
        $this->total_atividades   = $dados->total_atividades;
        $this->total_tarefas      = $dados->total_tarefas;
        $this->tarefas_concluidas = $dados->tarefas_concluidas;
    }

public function getAtividadesRecentes()
{
    include_once __DIR__ . '/../DAO/DashboardDAO.php';

    $dao = new DashboardDAO();

    $this->atividades_recentes = $dao->getAtividadesRecentes();
}
}
