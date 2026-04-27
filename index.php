<?php
    ob_start(); // Inicia o buffer de saída
    session_start();
    require_once "model/funcoes.php";
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'home';
?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficina Pro - Gestão</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        /* CSS adicional apenas para garantir o Footer no rodapé em páginas com pouco conteúdo */
        html,body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            flex-direction: column;

        }
        main {
            flex: 1;
        }
    </style>
</head>

<body class="bg-light h-100">
    <header>
        <?php require_once "view/includes/header.php"; ?>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase" href="index.php?p=home">
                <i class="bi bi-wrench-adjustable-circle text-primary me-2"></i>Oficina Pro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'home' ? 'active' : '' ?>" href="index.php?p=home">Home</a>
                    </li>
                    <li class="nav-item border-start border-secondary ms-lg-2 ps-lg-2">
                        <a class="nav-link <?= $pagina == 'cadastro_usuarios' ? 'active' : '' ?>" href="index.php?p=cadastro_usuarios">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'cadastro_servicos' ? 'active' : '' ?>" href="index.php?p=cadastro_servicos">Novos Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'servicos' ? 'active' : '' ?>" href="index.php?p=servicos">Listagem</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'orcamento' ? 'active' : '' ?>" href="index.php?p=orcamento">Orçamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'Carrinho' ? 'active' : '' ?>" href="index.php?p=Carrinho">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'dash' ? 'active' : '' ?>" href="index.php?p=dash">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pagina == 'cadastro' ? 'active' : '' ?>" href="index.php?p=cadastro">Cadastro</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm px-4 fw-bold" href="index.php?p=login">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        <div class="container py-4">
            <?php
            switch ($pagina) {
                case 'home':
                    echo "
                    <div class='p-5 mb-4 bg-white border rounded-3 shadow-sm'>
                        <div class='container-fluid py-5 text-center'>
                            <h1 class='display-4 fw-bold text-dark'>Bem-vindo(a) à Oficina.</h1>
                            <p class='fs-4 text-muted'>Gerencie serviços, peças e funcionários em um só lugar.</p>
                            <hr class='my-4 mx-auto w-25'>
                            <div class='d-flex justify-content-center gap-2'>
                                <a href='?p=cadastro_servicos' class='btn btn-dark btn-lg px-4'>Novo Serviço</a>
                                <a href='?p=servicos' class='btn btn-outline-secondary btn-lg px-4'>Ver Lista</a>
                            </div>
                        </div>
                    </div>";
                    break;
                case 'cadastro_usuarios':
                    include 'view/cadastroUsuarios.php';
                    break;
                case 'cadastro':
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
                case 'orcamento':
                    include 'view/Orcamento.php';
                    break;
                case 'Carrinho':
                    include 'view/carrinho.php';
                    break;
                case 'dash':
                    include 'view/dashboard.php';
                    break;
                default:
                    echo "
                    <div class='alert alert-danger shadow-sm border-0 d-flex align-items-center' role='alert'>
                        <i class='bi bi-exclamation-triangle-fill fs-2 me-3'></i>
                        <div>
                            <h4 class='alert-heading mb-0'>Erro 404: Página não encontrada!</h4>
                            <p class='mb-0'>O link que você seguiu pode estar quebrado ou a página foi removida.</p>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </main>

    <footer class="bg-dark text-secondary py-3 mt-auto border-top border-secondary text-center">
        <div class="container">
            <?php require_once "view/includes/footer.php"; ?>
            <p class="mb-0 small text-uppercase fw-light" style="letter-spacing: 1px;">
                &copy; <?= date('Y') ?> - Oficina Pro - Sistema de Gestão Interna
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
ob_end_flush(); 
?>