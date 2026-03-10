<?php if (!isset($model)) $model = new stdClass(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Status da Atividade</title>
 <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css?=v1">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Cadastro Status das Atividades</h2>
            <p>Preencha os dados abaixo para registrar o Status da Atividade.</p>
        </div>

    <form method="post" action="/samp/mediadortarefa/form/save">

    <label>Mediador</label>
    <input type="text" name="mediador" value="<?= $model->mediador ?? '' ?>">

    <label>Curso</label>
    <input type="text" name="curso" value="<?= $model->curso ?? '' ?>">

    <label>Atividade</label>
    <input type="text" name="atividade" value="<?= $model->atividade ?? '' ?>">

    <label>Status</label>
    <select name="status" required>
    <option value="">Selecione o status</option>
    <option value="Concluido"
        <?= (($model->status ?? '') == 'Concluido') ? 'selected' : '' ?>>
        Concluído
    </option>

    <option value="Em Execução"
        <?= (($model->status ?? '') == 'Em Execução') ? 'selected' : '' ?>>
        Em Execução
    </option>

    <option value="Não se Aplica"
        <?= (($model->status ?? '') == 'Não se Aplica') ? 'selected' : '' ?>>
        Não se Aplica
    </option>

    <option value="Em Atraso"
        <?= (($model->status ?? '') == 'Em Atraso') ? 'selected' : '' ?>>
        Em Atraso
    </option>
    </select>

    <button type="submit">Salvar</button>
</form>

    </div>
</body>
</html>