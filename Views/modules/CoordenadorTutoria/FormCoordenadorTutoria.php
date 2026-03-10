<?php if (!isset($model)) $model = new stdClass(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cursos</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Cadastro de Coordenador de Tutoria</h2>
            <p>Preencha os dados abaixo para registrar um novo Coordenador de Tutoria.</p>
        </div>
        <form method="post" action="/samp/coordenadortutoria/form/save">
            <input type="hidden" value="<?= $model->idcoordenador_tutoria ?>" name="idcoordenador_tutoria" />
            <fieldset>
                <div class="form-group" id="nome-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" placeholder="Ex: João Araujo" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nivel">Email</label>
                        <input id="email" name="email" value="<?= $model->email ?>" type="text" placeholder="Ex: joao@gmail.com" />
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" name="telefone" value="<?= $model->telefone ?>" type="text" placeholder="Ex: (99) 999999999" />
                    </div>
                </div>
    <button type="submit">
                    Salvar Cadastro
                </button>
            </div>
            </fieldset>
        </form>
    </div>
</body>
</html>