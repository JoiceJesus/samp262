<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMP - Portal Acadêmico</title>
    <link rel="stylesheet" href="/samp/Views/modules/CSS/dashboard.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i> SAMP
        </div>
        
        <div class="user-container" id="userContainer">
            <div class="user-trigger">
                <span>User</span>
                <i class="fas fa-user-circle"></i>
                <i class="fas fa-chevron-down arrow" id="arrowIcon"></i>
            </div>
            
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="/samp/usuario/form?id=<?= $_SESSION['id_usuario'] ?>">
    <i class="far fa-user"></i> Meu Perfil
</a>
                <a href="#"><i class="fas fa-cog"></i> Configurações</a>
                <div class="divider"></div>
                <a href="/samp/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </header>

    <main class="content">
        <h1>Olá, <?= htmlspecialchars($_SESSION['nome']) ?>! 👋</h1>
        <p class="subtitle">Bem-vindo ao seu Sistema de Gerenciamento Mediador Pedagogico.</p>

        <div class="stats-grid">
            <div class="card">
                <div class="card-header">
                    <span>Cursos Ativos</span>
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-body"><?= $model->total_cursos ?></div>

                <div class="card-footer">Engenharia, Matemática, etc.</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>Tarefas</span>
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-body"> <?= $model->total_tarefas ?> </div>

                <div class="progress-container">
                    <div class="progress-bar" style="width: 85%;"></div>
                </div>
                <div class="card-footer text-green">xxx</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>Tarefas Concluidas</span>
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="card-body"><?= $model->tarefas_concluidas ?></div>
                <div class="card-footer text-blue">xxx</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>Estatisticas 2025</span>
                    <i class="fas fa-star"></i>
                </div>
                <div class="card-body">10</div>
                <div class="card-footer">De 240 Totais</div>
            </div>
        </div>

        <h3>Acesso Rápido</h3>
        <div class="quick-actions">
           <button class="action-btn" onclick="window.location.href='/samp/mediadortarefa'">
        <i class="fas fa-briefcase"></i> Tarefas</button>
            <button class="action-btn"><i class="fas fa-calendar-alt"></i> Calendário</button>
            <button class="action-btn"><i class="fas fa-bell"></i> Avisos</button>
        </div>

        <h3>Atividades Recentes</h3>
        <div class="activities-panel">
            <div class="activity-row">
                <span class="badge blue">RELATORIOS</span>
                <p>Entrega de Relatorios — <strong>Prazo estendido 06/02/2026</strong></p>
                <span class="time">há 4 horas</span>
            </div>
            <div class="activity-row">
                <span class="badge green">REUNIÃO</span>
                <p>Reunião de Boas Vindas — <strong>Sexta 19/04/2026</strong></p>
                <span class="time">há 13 horas</span>
            </div>
            <div class="activity-row">
                <span class="badge yellow">DIVERSOS</span>
                <p>Boas Vindas aos Alunos <strong>03/03/2026</strong></p>
                <span class="time">há 2 dias</span>
            </div>
        </div>
    </main>
    <script src="/samp/Views/modules/Javascript/script.js"></script>
</body>
</html>