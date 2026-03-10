<?php if (!isset($model)) $model = new stdClass(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atividades</title>
   <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Cadastro de Atividades</h2>
            <p>Preencha os dados abaixo para registrar uma Atividade.</p>
        </div>
        <form method="post" action="/samp/atividade/form/save">
            <input type="hidden" value="<?= $model->idatividade ?>" name="idatividade" />
            <fieldset>
                <!--$nome, $orientacoes, $setor_tramitacao, $tarefas_idtarefas;-->
                <div class="form-group" id="nome-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" placeholder="Ex: Pesquisa documental" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="orientacoes">Orientações</label>
                        <input id="orientacoes" name="orientacoes" value="<?= $model->orientacoes ?>" type="text" placeholder="Ex: Fazer pesquisa pela plataforma UAB " />
                    </div>
                    <div class="form-group">
                        <label for="setor_tramitacao">Setor Tramitação</label>
                        <input id="setor_tramitacao" name="setor_tramitacao" value="<?= $model->setor_tramitacao ?>" type="text" placeholder="Ex: SUPAD" />
                    </div>
                </div>
                <!--selecionando o coordenador pelo id para aparecer na tela para edicao--> 
              <div class="form-group" id="select-group">
    <label>Tarefa</label>

    <select name="tarefas_idtarefas" required>
    <option value="">Selecione uma Tarefa</option>
<?php var_dump($atividades_recentes); ?>
    <?php foreach ($model->tarefas as $tarefa): ?>
    <option value="<?= $tarefa['idtarefa'] ?>"
        <?= ($model->tarefas_idtarefas == $tarefa['idtarefa']) ? 'selected' : '' ?>>
        <?= $tarefa['fase_curso'] ?>
    </option>
<?php endforeach; ?>
</select>
</div>
    <button type="submit">
                    Salvar Atividade
                </button>
            </div>
            </fieldset>
        </form>
    </div>
</body>
</html>