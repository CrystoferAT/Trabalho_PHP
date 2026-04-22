<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviços</title>
</head>
<header>
    <?php
        require_once "includes/header.php";
    ?>
</header>
<body>
    <h1>Cadastro de Serviços</h1>
    
    <form action="" method="post">
        Serviço Técnico: <input type="text" name="servico"><br><br>
        Tempo: <input type="number" name="tempo"><br><br>
        Preco: <input type="number" name="precoservico"><br><br>
        Peças: <input type="text" name="pecas">
        Preço: <input type="text" name="precopeca"><br><br>
        Valor Total: <input type="number" name="valorfinal"><br><br>
        
    </form>

</body>
<footer>
    <?php
        require_once "includes/footer.php";
    ?>
</footer>
</html>