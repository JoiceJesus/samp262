<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/samp/Views/modules/CSS/form.css?v=1">
    <style>
input { border: 3px solid red; }
</style>
</head>
<body>
<div class="card">
    <div class="header-blue">
        <div class="icon-box">🔐</div>
        <h2>Login</h2>
        <p>Acesse o sistema com seu e-mail e senha</p>
    </div>

    <form method="post" action="/samp/login/auth">
        <fieldset>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit">
                Entrar
            </button>

        </fieldset>
    </form>
</div>
</body>
</html>
