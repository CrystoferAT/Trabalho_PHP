<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<h1>Cadastro de Funcionários</h1>

<form action="index.php?p=salvar_usuario" method="post">
    <label>Nome: </label>
    <input type="text" name="nome" required><br><br>

    <label>Nível de acesso: </label>
    <input type="radio" name="nivel" value="Pro master" required> Pro Master
    <input type="radio" name="nivel" value="Master"> Master
    <input type="radio" name="nivel" value="Usuario"> Usuario
    <input type="radio" name="nivel" value="Cliente"> Cliente
    <br><br>

    <label>Email: </label>
    <input type="email" name="email" required><br><br>

    <label>Chave de acesso:</label>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Cadastrar</button>
</form>

<hr>

<h2>Usuários cadastrados:</h2>

<pre>
<?php
// Mostra o conteúdo atual da sessão
if (!empty($_SESSION['usuarios'])) {
    print_r($_SESSION['usuarios']);
} else {
    echo "Nenhum funcionário cadastrado.";
}
?>
</pre>