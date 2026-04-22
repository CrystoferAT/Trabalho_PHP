<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novoUser = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    // Salva no "banco de dados" da sessão
    // Nota: Em um sistema real, aqui você usaria password_hash
    $_SESSION['usuarios_cadastrados'][] = [
        'usuario' => $novoUser,
        'senha' => $novaSenha
    ];

    echo "<script>alert('Conta criada com sucesso! Agora faça login.'); window.location.href='index.php?v=login';</script>";
}
?>

<div class="login-container">
    <div class="login-box">
        <h2>Criar Nova Conta</h2>
        <p>Preencha os dados abaixo</p>

        <form action="index.php?v=cadastro_usuario" method="POST">
            <input type="text" name="usuario" placeholder="Escolha um usuário" required>
            <input type="password" name="senha" placeholder="Escolha uma senha" required>
            <button type="submit" style="width: 100%; background-color: #3498db;">Criar Conta</button>
        </form>

        <p style="margin-top: 15px; font-size: 0.9rem;">
            Já tem conta? <a href="index.php?v=login" style="color: #3498db; text-decoration: none;">Voltar ao login</a>
        </p>
    </div>
</div>
