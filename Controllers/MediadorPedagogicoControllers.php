<?php

class MediadorPedagogicoControllers
{
    public static function index()
    {
        try {
            include 'Models/MediadorPedagogicoModels.php';

            $model = new MediadorPedagogicoModels();
            $model->getAllRows();

            include 'Views/modules/MediadorPedagogico/ListaMediadorPedagogico.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar mediadores pedagógicos.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
    {
        try {
            include 'Models/MediadorPedagogicoModels.php';

            $model = new MediadorPedagogicoModels();

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }

            include 'Views/modules/MediadorPedagogico/FormMediadorPedagogico.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao carregar formulário do mediador pedagógico.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function save()
    {
        try {
            include 'Models/MediadorPedagogicoModels.php';

            $model = new MediadorPedagogicoModels();

            $model->idmediador_pedagogico = $_POST['idmediador_pedagogico'] ?? null;
            $model->nome = $_POST['nome'] ?? '';
            $model->email = $_POST['email'] ?? '';
            $model->telefone = $_POST['telefone'] ?? '';
            $model->coordenador_tutoria_idcoordenador_tutoria =
            $_POST['coordenador_tutoria_idcoordenador_tutoria'] ?? null;

            $model->save();

            header("Location: /samp/mediadorpedagogico");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar mediador pedagógico.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/MediadorPedagogicoModels.php';

            $model = new MediadorPedagogicoModels();
            $model->delete((int) $_GET['id']);

            header("Location: /samp/mediadorpedagogico");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir mediador pedagógico.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
