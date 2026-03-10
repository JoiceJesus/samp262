<?php

class AtividadeControllers 
{
    public static function index()
    {
        try {
            include 'Models/AtividadeModels.php';

            $model = new AtividadeModels();
            $model->getAllRows();

            include 'Views/modules/Atividade/ListaAtividade.php';

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao listar atividades.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }

    public static function form()
{
    try {
        include 'Models/AtividadeModels.php';

        $model = new AtividadeModels();

        if (isset($_GET['id'])) {
            $model = $model->getById((int) $_GET['id']);
        }

        // garantir que SEMPRE seja AtividadeModels
        if (!($model instanceof AtividadeModels)) {
            $model = new AtividadeModels();
        }

        // carregar tarefas
        $model->tarefas = $model->getTarefas();

        include 'Views/modules/Atividade/FormAtividade.php';

    } catch (Throwable $e) {
        echo "<pre>";
        echo $e->getMessage();
        echo "\nArquivo: " . $e->getFile();
        echo "\nLinha: " . $e->getLine();
        echo "</pre>";
        exit;
    }
}

    public static function save()
    {
        try {
            include 'Models/AtividadeModels.php';

            $model = new AtividadeModels();

            $model->idatividade = $_POST['idatividade'] ?? null;
            $model->nome = $_POST['nome'] ?? '';
            $model->orientacoes = $_POST['orientacoes'] ?? '';
            $model->setor_tramitacao = $_POST['setor_tramitacao'] ?? '';
            $model->tarefas_idtarefas = $_POST['tarefas_idtarefas'] ?? null;
            

            $model->save();
           require_once __DIR__ . '/../utils/Email.php';

$mediadores = $model->getMediadores(); // buscar no banco

foreach ($mediadores as $mediador) {

    Email::enviar(
        $mediador->email,
        $mediador->nome,
        $model->nome
    );

}
            header("Location: /samp/atividade");
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao salvar a atividade.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado ao salvar.";
        }
    }

    public static function delete()
    {
        try {
            include 'Models/AtividadeModels.php';

            $model = new AtividadeModels();
            $model->delete((int) $_GET['id']);

            header("Location: /samp/atividade");

        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo "Erro ao excluir a atividade.";
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Erro inesperado.";
        }
    }
}
