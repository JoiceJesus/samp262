<?php
include __DIR__ . '/Controllers/CursosControllers.php';
include __DIR__ . '/Controllers/CoordenadorTutoriaControllers.php';
include __DIR__ . '/Controllers/TarefaControllers.php';
include __DIR__ . '/Controllers/AtividadeControllers.php';
include __DIR__ . '/Controllers/MediadorPedagogicoControllers.php';
include __DIR__ . '/Controllers/MediadorTarefaControllers.php';
include __DIR__ . '/Controllers/UsuarioControllers.php';
include __DIR__ . '/Controllers/DashboardControllers.php';
 
//pegar a URL completa
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base_directory = '/samp';

$url_limpa = str_replace($base_directory, '', $url);

if ($url_limpa === '') {
    $url_limpa = '/';
}

// Rota que o usuario ta acessando
switch ($url_limpa) {
    case '/':
        UsuarioControllers::login();
        break;
    case '/curso':
        CursosControllers::index();
        break;
    case '/curso/form':
        CursosControllers::form();
        break;
     case '/curso/form/save':
        CursosControllers::save();
        break;
    case '/curso/delete':
        CursosControllers::delete();
        break;
    //coordenador tutoria
    case '/coordenadortutoria':
        CoordenadorTutoriaControllers::index();
        break;
    case '/coordenadortutoria/form':
        CoordenadorTutoriaControllers::form();
        break;
     case '/coordenadortutoria/form/save':
        CoordenadorTutoriaControllers::save();
        break;
    case '/coordenadortutoria/delete':
        CoordenadorTutoriaControllers::delete();
        break;
    //tarefas
    case '/tarefa':
        TarefaControllers::index();
        break;
    case '/tarefa/form':
        TarefaControllers::form();
        break;
     case '/tarefa/form/save':
        TarefaControllers::save();
        break;
    case '/tarefa/delete':
        TarefaControllers::delete();
        break;
    // Atividade
    case '/atividade':
        AtividadeControllers::index();
        break;
    case '/atividade/form':
        AtividadeControllers::form();
        break;
     case '/atividade/form/save':
        AtividadeControllers::save();
        break;
    case '/atividade/delete':
        AtividadeControllers::delete();
        break;
    // Mediador Pedagogico
    case '/mediadorpedagogico':
        MediadorPedagogicoControllers::index();
        break;
    case '/mediadorpedagogico/form':
        MediadorPedagogicoControllers::form();
        break;
     case '/mediadorpedagogico/form/save':
        MediadorPedagogicoControllers::save();
        break;
    case '/mediadorpedagogico/delete':
        MediadorPedagogicoControllers::delete();
        break;
     // Mediador Tarefa
    case '/mediadortarefa':
        MediadorTarefaControllers::index();
        break;
    case '/mediadortarefa/form':
        MediadorTarefaControllers::form();
        break;
     case '/mediadortarefa/form/save':
        MediadorTarefaControllers::save();
        break;
    case '/mediadortarefa/delete':
        MediadorTarefaControllers::delete();
        break;
    // Usuario
    case '/usuario':
        UsuarioControllers::index();
        break;
    case '/usuario/form':
        UsuarioControllers::form();
        break;
     case '/usuario/form/save':
        UsuarioControllers::save();
        break;
    case '/usuario/delete':
        UsuarioControllers::delete();
        break;
    case '/login':
    UsuarioControllers::login();
    break;
    case '/login/auth':
        UsuarioControllers::auth();
        break;
    case '/dashboard':
    DashboardControllers::index();
    break;
    case '/logout':
    UsuarioControllers::logout();
    break;
    default:
        echo "ERRO 404";
        break;
}
?>  