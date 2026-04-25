<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $captcha_usuario = $_POST['captcha'];

    // 1. Verifica se o CAPTCHA está certo
    if ($captcha_usuario != $_SESSION['captcha_soma']) {
        $erro = "Soma do CAPTCHA incorreta!";
    } else {
        // 2. Se o CAPTCHA estiver certo, tenta o login
        if (validarLogin($usuario, $senha)) {
            header("Location: index.php?p=dashboard");
            exit;
        } else {
            $erro = "Usuário ou senha inválidos!";
        }
    }
}

// Gera um novo desafio toda vez que a página carrega
$pergunta = gerarCaptcha();
?>

<div class="login-container">
    <h2>Acesso ao Sistema</h2>
    
    <?php if ($erro): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>

    <form action="index.php?p=login" method="POST">
        <input type="text" name="usuario" placeholder="E-mail ou admin" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        
        <p><b>Segurança:</b> <?= $pergunta ?></p>
        <input type="number" name="captcha" placeholder="Resultado da soma" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</div>