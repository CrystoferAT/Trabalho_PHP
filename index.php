<?php
    require_once "model/funcoes.php";
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'home';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina</title>
    <style>
        html, body {
            height: 100%;
            margin: 10px;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
            margin: 10px;
            padding: 20px;
        }
        header, footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <header>
        <?php require_once "view/includes/header.php"; ?>
    </header>

    <nav>
        <h2>Oficina Pro</h2>
        <ul>
            <li><a href="index.php?p=home">Home</a></li>
            <li><a href="index.php?p=cadastro_usuarios">Cadastro de Funcionários</a></li>
            <li><a href="index.php?p=cadastro_servicos">Cadastro de Serviços </a></li>
            <li><a href="index.php?p=login">Login</a></li>
            <li><a href="index.php?p=cadastro_usuario">Cadastre-se (Cliente)</a></li>
            <li><a href="index.php?p=servicos">Serviços Cadastrados</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>

    <main>
        <?php
        switch ($pagina) {
            case 'home':
                echo "<h1>Bem Vindo(a) á Oficina.</h1>";
                break;
            case 'cadastro_usuarios':
                include 'view/cadastroUsuarios.php';
                break;
            case 'cadastro_usuario':
                include 'view/cadastro_usuario.php';
                break;
            case 'cadastro_servicos':
                include 'view/cadastroServicos.php';
                break;
            case 'login':
                include 'view/login.php'; 
                break;
            case 'servicos':
                include 'view/servicosCadastrados.php';
                break;
            case 'dashboard':
                echo "<h1>Painel de Controle</h1>";
                if(isset($_SESSION['usuario'])) {
                    echo "<p>Olá, " . $_SESSION['usuario']['nome'] . "!</p>";
                }
                break;
            default:
                echo "<h1>Página não encontrada!</h1>";
        }
        ?>
    </main>

    <footer>
        <?php require_once "view/includes/footer.php"; ?>
    </footer>
</body>
</html>