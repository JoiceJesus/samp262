<?php if (!isset($model)) $model = new stdClass(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Tarefa</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css">
    
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Cadastro de Tarefas</h2>
            <p>Preencha os dados abaixo para registrar uma nova tarefa.</p>
        </div>
        <form method="post" action="/samp/tarefa/form/save">
            <input type="hidden" value="<?= $model->idtarefa ?>" name="idtarefa" />
            <fieldset>
              <div class="form-group" id="nome-group">
    <label for="fase_curso">Fase do Curso</label>
    <select id="fase_curso" name="fase_curso" required>
        <option value="">Selecione a Fase</option>

        <option value="1. Antes de Iniciar o Curso"
            <?= ($model->fase_curso ?? '') === '1. Antes de Iniciar o Curso' ? 'selected' : '' ?>>
            1. Antes de Iniciar o Curso
        </option>

        <option value="2. Durante a Realização do Curso"
            <?= ($model->fase_curso ?? '') === '2. Durante a Realização do Curso' ? 'selected' : '' ?>>
            2. Durante a Realização do Curso
        </option>

        <option value="3. Após a Conclusão do Curso"
            <?= ($model->fase_curso ?? '') === '3. Após a Conclusão do Curso' ? 'selected' : '' ?>>
            3. Após a Conclusão do Curso
        </option>
    </select>
</div>  
                <div class="form-row">
                    <div class="form-group">
                        <label for="doc_modelo">Documento Modelo</label>
                        <input id="doc_modelo" name="doc_modelo" value="<?= $model->doc_modelo ?>" type="text" placeholder="Ex: Link Google Drive" />
                    </div>
                </div> 
                
                <button type="submit">
                    Salvar Tarefa
                </button>
            </fieldset>
        </form>
    </div>
</body>
</html>