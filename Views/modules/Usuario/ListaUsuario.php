<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/lista.css?=v2">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Usuários Cadastrados</h2>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th style="width: 5%;"></th>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 30%;">Nome</th>
                    <th style="width: 35%;">E-mail</th>
                    <th style="width: 20%;">Perfil</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($model->rows) && !empty($model->rows)): 
                    foreach ($model->rows as $item): 
                        $id = $item->id_usuario;
                ?>
                        <tr>
                            <td>
                                <a href="/samp/usuario/delete?id=<?= $id ?>"
                                   onclick="return confirm('Deseja excluir este usuário?')">
                                   X
                                </a>
                            </td>

                            <td><?= $id ?></td>

                            <td>
                                <a href="/samp/usuario/form?id=<?= $id ?>">
                                    <?= htmlspecialchars($item->nome) ?>
                                </a>
                            </td>

                            <td><?= htmlspecialchars($item->email) ?></td>

                            <td><?= ucfirst($item->perfil) ?></td>
                        </tr>
                    <?php endforeach;
                else: ?>
                    <tr>
                        <td colspan="5" class="no-data">Nenhum Usuário Encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
