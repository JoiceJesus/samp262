<?php

class DashboardControllers {

   public static function index() {
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: /samp/login");
        exit;
    }

    require_once __DIR__ . '/../Models/DashboardModels.php';

    $model = new DashboardModel();
    $model->getDados();
    $model->getAtividadesRecentes(); // ← FALTAVA ISSO

    if ($_SESSION['perfil'] === 'coordenador') {
        require_once __DIR__ . '/../Views/modules/Dashboard/DashboardCoordenador.php';
    } elseif ($_SESSION['perfil'] === 'mediador') {
        require_once __DIR__ . '/../Views/modules/Dashboard/DashboardMediador.php';
    } else {
        echo "Perfil inválido";
    }
}
   public static function atvs()
{
    include 'Models/DashboardModel.php';

    $model = new DashboardModel();

    $model->getAtividadesRecentes();

    include 'Views/modules/Dashboard/Dashboard.php';
}
    
}