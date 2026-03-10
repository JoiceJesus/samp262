<?php

class MediadorTarefaControllers
{
    public static function index()
    {
        try {
            include 'Models/MediadorTarefaModels.php';

            $model = new MediadorTarefaModels();
            $model->getAllRows();

            include 'Views/modules/MediadorTarefa/ListaMediadorTarefa.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar mediadores e tarefas.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
    {
        try {
            include 'Models/MediadorTarefaModels.php';

            $model = new MediadorTarefaModels();

            if (isset($_GET['mediador']) && isset($_GET['curso'])) {
                $model = $model->getById((int)$_GET['mediador'], (int)$_GET['curso']);
            }

            include 'Views/modules/MediadorTarefa/FormMediadorTarefa.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao carregar formulário do mediador tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function save()
    {
        try {
            include 'Models/MediadorTarefaModels.php';

            $model = new MediadorTarefaModels();

            $model->mediador  = $_POST['mediador'] ?? null;
            $model->curso     = $_POST['curso'] ?? null;
            $model->atividade = $_POST['atividade'] ?? null;
            $model->status    = $_POST['status'] ?? '';

            $model->save();

            header("Location: /samp/mediadortarefa");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar mediador tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/MediadorTarefaModels.php';

            $model = new MediadorTarefaModels();
            $model->delete((int)$_GET['mediador'], (int)$_GET['curso']);

            header("Location: /samp/mediadortarefa");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir mediador tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
