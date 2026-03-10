<?php

class CursosControllers 
{
    public static function index()
    {
        try {
            include 'Models/CursosModels.php';

            $model = new CursosModels();
            $model->getAllRows();

            include 'Views/modules/Cursos/ListaCursos.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar cursos.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
    {
        try {
            include 'Models/CursosModels.php';
            include 'Models/CoordenadorTutoriaModels.php';

            $model = new CursosModels();

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }

            $coordenadorModel = new CoordenadorTutoriaModels();
            $coordenadores = $coordenadorModel->getAllRows();

            include 'Views/modules/Cursos/FormCursos.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao carregar formulário.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function save()
    {
        try {
            include 'Models/CursosModels.php';

            $model = new CursosModels();

            $model->idcurso = $_POST['idcurso'] ?? null;
            $model->nome = $_POST['nome'] ?? '';
            $model->nivel = $_POST['nivel'] ?? '';
            $model->inicio_semestre = $_POST['inicio_semestre'] ?? '';
            $model->coordenador = $_POST['coordenador'] ?? '';
            $model->telefone = $_POST['telefone'] ?? '';
            $model->oferta = $_POST['oferta'] ?? '';
            $model->email = $_POST['email'] ?? '';
            $model->pedagogo = $_POST['pedagogo'] ?? '';
            $model->sipac = $_POST['sipac'] ?? '';
            $model->coordenador_tutoria_idcoordenador_tutoria =
                $_POST['coordenador_tutoria_idcoordenador_tutoria'] ?? null;

            $model->save();

            header("Location: /samp/curso");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar o curso.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/CursosModels.php';

            $model = new CursosModels();
            $model->delete((int) $_GET['id']);

            header("Location: /samp/curso");

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir o curso.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
