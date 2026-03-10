<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas Cadastradas</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/lista.css?=v2">

</head>
<body>

    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Tarefas Cadastradas</h2>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th style="width: 5%;"></th> <th style="width: 10%;">ID</th>
                    <th style="width: 45%;">Fase do Curso</th>
                    <th style="width: 40%;">Documento Modelo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($model->rows) && !empty($model->rows)): 
                    foreach ($model->rows as $item): ?>
                        <tr>
                            <td><a href="/samp/tarefa/delete?id=<?= $item->idtarefa ?>">X</a></td>
                            <td><?= $item->idtarefa ?></td>
                            <td><a href="/samp/tarefa/form?id=<?= $item->idtarefa ?>"><?= $item->fase_curso ?></a></td>
                            <td>
    <?php if (!empty($item->doc_modelo)): ?>
        <?php 
            // Se começar com http ou https, usa direto
            if (str_starts_with($item->doc_modelo, "http://") || str_starts_with($item->doc_modelo, "https://")) {
                $link = $item->doc_modelo;
            } else {
                // Senão, concatena com a pasta local
                $link = "/samp/docs/" . $item->doc_modelo;
            }
        ?>
        <a href="<?= $link ?>" target="_blank"><?= $item->doc_modelo ?></a>
    <?php else: ?>
        Sem documento
    <?php endif; ?>
</td>
                        </tr>
                    <?php endforeach;
                else: ?>
                    <tr>
                        <td colspan="4" class="no-data">Nenhuma tarefa encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>