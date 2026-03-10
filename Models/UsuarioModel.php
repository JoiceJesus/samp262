<?php

class UsuarioModels {
    public $id_usuario;
    public $rows;
    public $nome, $email, $senha, $perfil;

    public function save() {
        include 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();

        if (!empty($this->id_usuario)) {
            $dao->update($this);
        } else {
            $dao->insert($this);
        }
    }

    public function getAllRows() {
        include 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        $this->rows = $dao->select();
    }

    public function getById(int $id) {
        include 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        return $dao->selectById($id);
    }

    public function delete(int $id) {
        include 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        $dao->delete($id);
    }

    // LOGIN
    public function login($email, $senha) {
        include 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        return $dao->login($email, $senha);
    }
}
