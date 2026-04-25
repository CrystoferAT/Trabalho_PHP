<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    $novoMecanico = [
        'id' => count($_SESSION['mecanicos']) + 1,
        'nome' => $nome,
        'especialidade' => $especialidade
    ];

    $_SESSION['mecanicos'][] = $novoMecanico;

    echo "<p style='color: green; font-weight: bold;'>Mecânico cadastrado com sucesso!</p>";
}
?>

<h2>Cadastrar Novo Mecânico</h2>
<p>Preencha os dados do profissional abaixo.</p>

<form action="index.php?v=mecanicos_cad" method="POST">
    <label>Nome Completo:</label>
    <input type="text" name="nome" placeholder="Ex: Roberto Almeida" required>
    
    <label>Especialidade:</label>
    <select name="especialidade" style="width: 100%; padding: 10px; margin: 10px 0;">
        <option value="Motores">Motores</option>
        <option value="Suspensão">Suspensão</option>
        <option value="Elétrica">Elétrica</option>
        <option value="Injeção Eletrônica">Injeção Eletrônica</option>
    </select>
    
    <button type="submit">Salvar Mecânico</button>
</form>

<br>
<a href="index.php?v=mecanicos_lista">Ver lista de mecânicos</a>
