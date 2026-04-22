<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    
    $_SESSION['servicos'][] = [
        'id' => count($_SESSION['servicos']) + 1,
        'descricao' => $desc,
        'preco' => (float)$preco
    ];
    echo "<p style='color:green'>Serviço cadastrado com sucesso!</p>";
}
?>

<h2>Cadastrar Novo Serviço</h2>
<form method="POST" action="index.php?v=servicos_cad">
    <label>Descrição:</label>
    <input type="text" name="descricao" required>
    
    <label>Preço (R$):</label>
    <input type="number" step="0.01" name="preco" required>
    
    <button type="submit">Salvar Serviço</button>
</form>
