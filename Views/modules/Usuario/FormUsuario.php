<?php 
session_start();
if (!isset($model)) $model = new stdClass(); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css?v=1">
</head>
<body>
    <div class="card">
        <div class="header-blue">
            <div class="icon-box">👤</div>
            <h2>Cadastro de Usuário</h2>
            <p>Preencha os dados abaixo para Registrar um Usuário.</p>
        </div>

        <form method="post" action="/samp/usuario/form/save">

            <input type="hidden" value="<?= $model->id_usuario ?? '' ?>" name="id_usuario" />

            <fieldset>

                <!-- nome -->
                <div class="form-group" id="nome-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="<?= $model->nome ?? '' ?>" type="text" placeholder="Ex: Maria Silva" required/>
                </div>

                <!-- email + senha -->
                <div class="form-row">

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" value="<?= $model->email ?? '' ?>" type="email" placeholder="Ex: maria@email.com" required />
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input id="senha" name="senha" type="password" placeholder="Digite a senha"
                        <?= isset($model->id_usuario) ? '' : 'required' ?> />
                    </div>

                </div>

                <!-- perfil -->
                <div class="form-group" id="select-group">
                    <label>Perfil</label>

                    <select name="perfil" required 
                    <?= (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'mediador') ? 'disabled' : '' ?>>

                        <option value="">Selecione o Perfil</option>

                        <option value="coordenador"
                        <?= (($model->perfil ?? '') === 'coordenador') ? 'selected' : '' ?>>
                        Coordenador
                        </option>

                        <option value="mediador"
                        <?= (($model->perfil ?? '') === 'mediador') ? 'selected' : '' ?>>
                        Mediador Pedagógico
                        </option>

                    </select>

                    <?php if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'mediador'): ?>
                        <input type="hidden" name="perfil" value="<?= $model->perfil ?>">
                    <?php endif; ?>

                </div>

                <button type="submit">
                    Salvar Usuário
                </button>

            </fieldset>

        </form>
    </div>
</body>
</html>