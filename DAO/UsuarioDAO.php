<?php
class UsuarioDAO {
    private $conexao;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function insert(UsuarioModels $model) {
        $sql = "INSERT INTO acesso (nome, email, senha, perfil)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, password_hash($model->senha, PASSWORD_DEFAULT));
        $stmt->bindValue(4, $model->perfil);
        $stmt->execute();
    }

    public function update(UsuarioModels $model) {
        $sql = "UPDATE acesso 
                SET nome=?, email=?, perfil=? 
                WHERE id_usuario=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->perfil);
        $stmt->bindValue(4, $model->id_usuario);
        $stmt->execute();
    }

    public function select() {
        $sql = "SELECT * FROM acesso";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete(int $id) {
        $sql = "DELETE FROM acesso WHERE id_usuario=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function selectById(int $id) {
        $sql = "SELECT * FROM acesso WHERE id_usuario=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("UsuarioModels");
    }

    // LOGIN
    public function login($email, $senha) {
        $sql = "SELECT * FROM acesso WHERE email=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($senha, $user->senha)) {
            return $user;
        }
        return false;
    }
    public function getMediadores()
{
    $sql = "SELECT nome, email FROM acesso WHERE perfil = 'mediador'";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
}
