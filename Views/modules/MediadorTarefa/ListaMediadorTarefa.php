<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas dos Mediadores Pedagógicos</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/lista.css?v=2">
</head>
<body>

<div class="card">
    <div class="header-blue">
        <div class="icon-box">📚</div>
        <h2>Tarefas Cadastradas dos Mediadores Pedagógicos</h2>
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th style="width: 5%;"></th>
                <th style="width: 25%;">Mediador</th>
                <th style="width: 25%;">Curso</th>
                <th style="width: 30%;">Atividade</th>
                <th style="width: 15%;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($model->rows)): ?>
                <?php foreach ($model->rows as $item): ?>
                    <tr>
                        <td>
                            <a href="/samp/mediadortarefa/delete?mediador=<?= $item->mediador ?>&curso=<?= $item->curso ?>">
                                X
                            </a>
                        </td>
                        <td>
                            <a href="/samp/mediadortarefa/form?mediador=<?= $item->mediador ?>&curso=<?= $item->curso ?>">
                            <?= $item->mediador ?>
                            </a>
                        </td>
                        <td><?= $item->curso ?></td>
                        <td><?= $item->atividade ?></td>
                        <td><?= $item->status ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-data">
                        Nenhuma tarefa encontrada.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>