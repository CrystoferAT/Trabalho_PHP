<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (cadastrarCliente($nome, $email, $senha)) {
        // Redireciona para o login com sucesso
        header("Location: index.php?p=login&msg=sucesso");
        exit;
    } else {
        $erro = "Erro: Este e-mail já está cadastrado no sistema!";
    }
}
?>

<div>
    <h2>Cadastro de Novo Cliente</h2>
    
    <?php if ($erro): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>

    <form action="index.php?p=cadastro_usuario" method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" required><br><br>
        <input type="email" name="email" placeholder="E-mail" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</div>