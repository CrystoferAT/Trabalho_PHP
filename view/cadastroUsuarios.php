<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Cadastro de funcionario</h1>
    <form action="index.php?p=controller_cadastrar" method="post">
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
</body>
</html>