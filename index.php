<?php
require_once 'funcoes.php';

// Proteção simples de login
if (!isset($_SESSION['usuario']) && $_GET['p'] != 'login') {
    header('Location: index.php?p=login');
}

$pagina = $_GET['p'] ?? 'dashboard';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <nav>
        <h2>Oficina Pro</h2>
        <ul>
            <li><a href="index.php?p=dashboard">Dashboard</a></li>
            <li><a href="index.php?p=mecanicos_lista">Mecânicos</a></li>
            <li><a href="index.php?p=servicos_cad">Novo Serviço</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>

    <main>
        <?php
        // Roteamento de páginas
        switch ($pagina) {
            case 'dashboard':
                include 'paginas/dashboard.php';
                break;
            case 'mecanicos_lista':
                include 'paginas/mecanicos_lista.php';
                break;
            case 'servicos_cad':
                include 'paginas/servicos_formulario.php';
                break;
            case 'login':
                include 'paginas/login.php';
                break;
            default:
                echo "<h1>Página não encontrada!</h1>";
        }
        ?>
    </main>
</body>
</html>
