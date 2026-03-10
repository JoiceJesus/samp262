<?php

class UsuarioControllers {

    public static function index() {
        include __DIR__ . '/../Models/UsuarioModel.php';
        $model = new UsuarioModels();
        $model->getAllRows();
        include __DIR__ . '/../Views/modules/Usuario/ListaUsuario.php';
    }

    public static function form() {
        include __DIR__ . '/../Models/UsuarioModel.php';
        $model = new UsuarioModels();

        if (isset($_GET['id'])) {
            $model = $model->getById((int)$_GET['id']);
        }

        include __DIR__ . '/../Views/modules/Usuario/FormUsuario.php';
    }

    public static function save() {
        include __DIR__ . '/../Models/UsuarioModel.php';

        $model = new UsuarioModels();
        $model->id_usuario = $_POST['id_usuario'] ?? null;
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'] ?? '';
        $model->perfil = $_POST['perfil'];

        $model->save();

        header("Location: /samp/usuario");
        exit;
    }

    public static function delete() {
        include __DIR__ . '/../Models/UsuarioModel.php';
        $model = new UsuarioModels();
        $model->delete((int)$_GET['id']);
        header("Location: /samp/usuario");
    }

    // LOGIN
     public static function login() {
    include 'Views/modules/Usuario/Login.php';
}   
    public static function auth() {
    session_start();
    include __DIR__ . '/../Models/UsuarioModel.php';

    $model = new UsuarioModels();
    $user = $model->login($_POST['email'], $_POST['senha']);

    if ($user) {
        $_SESSION['id_usuario'] = $user->id_usuario;
        $_SESSION['perfil'] = $user->perfil;
        $_SESSION['nome'] = $user->nome;

        header("Location: /samp/dashboard");
        exit;
    }

    echo "Login inválido";
}
public static function logout() {
    session_start();
    session_destroy();

    header("Location: /samp/login");
    exit;
}
}
