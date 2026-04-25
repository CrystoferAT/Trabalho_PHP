<?php
$erro = "";

// A lógica de processar o formulário fica aqui dentro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if (validarLogin($usuario, $senha)) {
        header("Location: index.php?v=dashboard");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<div class="login-container">
    <div class="login-box">
        <h2>Acesso ao Sistema</h2>
        <p>Use <b>admin / admin</b></p>
        
        <?php if ($erro): ?>
            <p style="color: red; margin-bottom: 10px;"><?= $erro ?></p>
        <?php endif; ?>

        <form action="index.php?v=login" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" style="width: 100%;">Entrar</button>
        </form>
        <p style="margin-top: 15px; font-size: 0.9rem;">
            Não tem uma conta? <a href="index.php?v=cadastro_usuario" style="color: #3498db; text-decoration: none; font-weight: bold;">Cadastre-se aqui</a>
        </p>
    </div>
</div>
