
<?php
    $pagina = isset($_GET['p'])? $_GET['p'] :"cadastro_usuarios";
?>

    <h1>Cadastro de Funcionários</h1>
    <form action="controller/LoginController.php" method="post">
            <label>Nome: </label>
            <input type="text" name="nome" required><br>

            <label>Nível de acesso: </label>
            <input type="radio" name="nivel" value="Pro master"> Pro Master
            <input type="radio" name="nivel" value="Master"> Master
            <input type="radio" name="nivel" value="Usuario"> Usuario
            <input type="radio" name="nivel" value="Cliente"> Cliente
            <br><label >Email: </label>
            <input type="email" name="email" required><br>
            <label>Chave de acesso</label>
            <input type="password" name="senha" required><br>

            <button type="submit">Entrar</button>
        
        </form>
