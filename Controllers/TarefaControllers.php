<?php

class TarefaControllers 
{
    public static function index()
    {
        try {
            include 'Models/TarefaModels.php';

            $model = new TarefaModels();
            $model->getAllRows();

            include 'Views/modules/Tarefa/ListaTarefa.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar tarefas.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
    {
        try {
            include 'Models/TarefaModels.php';

            $model = new TarefaModels();

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }

            include 'Views/modules/Tarefa/FormTarefa.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao carregar formulário da tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function save()
    {
        try {
            include 'Models/TarefaModels.php';

            $model = new TarefaModels();

            // ⚠️ ajuste de nome (provável correção)
            $model->idtarefa   = $_POST['idtarefa'] ?? null;
            $model->fase_curso = $_POST['fase_curso'] ?? '';
            $model->doc_modelo = $_POST['doc_modelo'] ?? '';

            $model->save();

            header("Location: /samp/tarefa");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/TarefaModels.php';

            $model = new TarefaModels();
            $model->delete((int) $_GET['id']);

            header("Location: /samp/tarefa");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir tarefa.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
