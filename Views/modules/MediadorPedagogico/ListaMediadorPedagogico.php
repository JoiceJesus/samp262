<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Mediadores Pedagogicos</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/lista.css?=v2">
</head>
<body>
    <div class="card">
       <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Mediadores Pedagogicos Cadastrados</h2>
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <th style="width: 5%;"></th> <th style="width: 10%;">ID</th>
                    <th style="width: 35%;">Nome</th>
                    <th style="width: 30%;">Email</th>
                    <th style="width: 20%;">Telefone</th>
                    <th style="width: 20%;">Coordenador de Tutoria</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($model->rows) && !empty($model->rows)): 
                    foreach ($model->rows as $item): 
                        // Variável idcoordenador_tutoria do seu primeiro código é usada nos links
                        $id = $item->idmediador_pedagogico;
                        ?>
                        <tr>
                            <td><a href="/samp/mediadorpedagogico/delete?id=<?= $id ?>">X</a></td>
                            <td><?= $id ?></td>
                            
                            <td><a href="/samp/mediadorpedagogico/form?id=<?= $id ?>"><?= $item->nome ?></a></td>
                            
                            <td><?= $item->email ?></td>
                            <td><?= $item->telefone ?></td>
                            <td><?= $item->coordenador_tutoria_idcoordenador_tutoria ?></td>
                        </tr>
                    <?php endforeach;
                else: ?>
                    <tr>
                        <td colspan="5" class="no-data">Nenhum Mediador Pedagogico encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>