<?php if (!isset($model)) $model = new stdClass(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Mediador Pedagogico</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">📚</div>
            <h2>Cadastro do Mediador Pedagogico</h2>
            <p>Preencha os dados abaixo para registrar um novo Mediador Pedagogico.</p>
        </div>
        <form method="post" action="/samp/mediadorpedagogico/form/save">
            <input type="hidden" value="<?= $model->idmediador_pedagogico ?>" name="idmediador_pedagogico" />
            <fieldset>
                <div class="form-group" id="nome-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" placeholder="Ex: João Araujo" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" value="<?= $model->email ?>" type="text" placeholder="Ex: joao@gmail.com" />
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" name="telefone" value="<?= $model->telefone ?>" type="text" placeholder="Ex: (99) 999999999" />
                    </div>
                </div>
                 <!--selecionando o coordenador pelo id para aparecer na tela para edicao--> 
               <div class="form-group" id="select-group">
    <label>Coordenador de Tutoria</label>

    <select name="coordenador_tutoria_idcoordenador_tutoria">
        <option value="">Selecione um Coordenador</option>

        <option value="1"
            <?= ($model->coordenador_tutoria_idcoordenador_tutoria == 1) ? 'selected' : '' ?>>
            João Silva
        </option>

        <option value="2"
            <?= ($model->coordenador_tutoria_idcoordenador_tutoria == 2) ? 'selected' : '' ?>>
            Maria Souza
        </option>
    </select>
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