<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/curso.css?v=3">
</head>

<body class="list-page">

<div class="card card-list">
    <div class="header-blue">
        <div class="icon-box">📚</div>
        <h2>Cursos</h2>
        <p>Lista de Cursos Cadastrados</p>
    </div>

    <div class="card-body">
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nível</th>
                        <th>Início do Semestre</th>
                        <th>Coordenador</th>
                        <th>Telefone</th>
                        <th>Oferta</th>
                        <th>Email</th>
                        <th>Pedagogo</th>
                        <th>SIPAC</th>
                        <th>Coord. Tutoria</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($model->rows)): ?>
                    <?php foreach ($model->rows as $item): ?>
                        <tr>
                            <td>
                                <a class="btn-delete" href="/samp/curso/delete?id=<?= $item->idcurso ?>">X</a>
                            </td>
                            <td><?= $item->idcurso ?></td>
                            <td>
                                <a class="link-edit" href="/samp/curso/form?id=<?= $item->idcurso ?>">
                                    <?= $item->nome ?>
                                </a>
                            </td>
                            <td><?= $item->nivel ?></td>
                            <td><?= $item->inicio_semestre ?></td>
                            <td><?= $item->coordenador ?></td>
                            <td><?= $item->telefone ?></td>
                            <td><?= $item->oferta ?></td>
                            <td><?= $item->email ?></td>
                            <td><?= $item->pedagogo ?></td>
                            <td><?= $item->sipac ?></td>
                            <td><?= $item->coordenador_tutoria_idcoordenador_tutoria ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12" class="no-data">Nenhum curso encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>