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
            <h2>Cadastro de Cursos</h2>
            <p>Preencha os dados abaixo para registrar um Novo Curso.</p>
        </div>
        <form method="post" action="/samp/curso/form/save">
            <input type="hidden" value="<?= $model->idcurso ?>" name="idcurso" />
            <fieldset>
                <div class="form-group" id="nome-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" placeholder="Ex: Bacharelado em Engenharia" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nivel">Nível</label>
                        <input id="nivel" name="nivel" value="<?= $model->nivel ?>" type="text" placeholder="Ex: Superior, Técnico, Extensão" />
                    </div>
                    
                    <div class="form-group">
                        <label for="inicio_semestre">Início Semestre</label>
                        <input id="inicio_semestre" name="inicio_semestre" value="<?= $model->inicio_semestre ?>" type="text" placeholder="Ex: 2026.1" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="coordenador">Coordenador do Curso (Texto)</label>
                        <input id="coordenador" name="coordenador" value="<?= $model->coordenador ?>"  type="text" placeholder="Nome do coordenador responsável" />
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" name="telefone" value="<?= $model->telefone ?>" type="text" placeholder="(99) 99999-9999" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="oferta">Oferta</label>
                        <input id="oferta" name="oferta" value="<?= $model->oferta ?>" type="text" placeholder="Ex: Presencial, EAD, Híbrido" />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" value="<?= $model->email ?>" type="text" placeholder="curso@instituicao.edu.br" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="pedagogo">Pedagogo</label>
                        <input id="pedagogo" name="pedagogo" value="<?= $model->pedagogo ?>" type="text" placeholder="Nome do pedagogo responsável" />
                    </div>
                    
                    <div class="form-group">
                        <label for="sipac">SIPAC</label>
                        <input id="sipac" name="sipac" value="<?= $model->sipac ?>" type="text" placeholder="Código ou link do SIPAC" />
                    </div>
                </div>
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
            </fieldset>
        </form>
    </div>
</body>
</html>