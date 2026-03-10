<?php

class CoordenadorTutoriaControllers 
{
    public static function index()
    {
        try {
            include 'Models/CoordenadorTutoriaModels.php';

            $model = new CoordenadorTutoriaModels();
            $model->getAllRows();

            include 'Views/modules/CoordenadorTutoria/ListaCoordenadorTutoria.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar coordenadores de tutoria.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
    {
        try {
            include 'Models/CoordenadorTutoriaModels.php';

            $model = new CoordenadorTutoriaModels();

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }

            include 'Views/modules/CoordenadorTutoria/FormCoordenadorTutoria.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao carregar formulário do coordenador.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function save()
    {
        try {
            include 'Models/CoordenadorTutoriaModels.php';

            $model = new CoordenadorTutoriaModels();

            $model->idcoordenador_tutoria = $_POST['idcoordenador_tutoria'] ?? null;
            $model->nome = $_POST['nome'] ?? '';
            $model->email = $_POST['email'] ?? '';
            $model->telefone = $_POST['telefone'] ?? '';

            $model->save();

            header("Location: /samp/coordenadortutoria");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar o coordenador de tutoria.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/CoordenadorTutoriaModels.php';

            $model = new CoordenadorTutoriaModels();
            $model->delete((int) $_GET['id']);

            header("Location: /samp/coordenadortutoria");

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir o coordenador de tutoria.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
