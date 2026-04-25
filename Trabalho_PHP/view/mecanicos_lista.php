<?php

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    foreach ($_SESSION['mecanicos'] as $key => $m) {
        if ($m['id'] == $id) {
            unset($_SESSION['mecanicos'][$key]);
            $_SESSION['mecanicos'] = array_values($_SESSION['mecanicos']); // Reorganiza os índices
            header("Location: index.php?v=mecanicos_lista");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_editar'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['mecanicos'] as $key => $m) {
        if ($m['id'] == $id) {
            $_SESSION['mecanicos'][$key]['nome'] = $_POST['nome'];
            $_SESSION['mecanicos'][$key]['especialidade'] = $_POST['especialidade'];
        }
    }
}

$mecanicoParaEditar = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    foreach ($_SESSION['mecanicos'] as $m) {
        if ($m['id'] == $id) {
            $mecanicoParaEditar = $m;
        }
    }
}

$mecanicos = $_SESSION['mecanicos'] ?? [];
?>

<h2>Gestão de Mecânicos</h2>
<p>Gerencie os profissionais da sua oficina abaixo.</p>

<?php if ($mecanicoParaEditar): ?>
    <div style="background: #ebedef; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #3498db;">
        <h3>Editando: <?= $mecanicoParaEditar['nome'] ?></h3>
        <form action="index.php?v=mecanicos_lista" method="POST">
            <input type="hidden" name="id" value="<?= $mecanicoParaEditar['id'] ?>">
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $mecanicoParaEditar['nome'] ?>" required>
            
            <label>Especialidade:</label>
            <input type="text" name="especialidade" value="<?= $mecanicoParaEditar['especialidade'] ?>" required>
            
            <button type="submit" name="btn_editar" style="background: #2980b9;">Salvar Alterações</button>
            <a href="index.php?v=mecanicos_lista" style="margin-left:10px; color: red;">Cancelar</a>
        </form>
    </div>
<?php endif; ?>

<table class="tabela-mecanicos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Profissional</th>
            <th>Especialidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($mecanicos) > 0): ?>
            <?php foreach ($mecanicos as $m): ?>
                <tr>
                    <td><?= $m['id'] ?></td>
                    <td><?= $m['nome'] ?></td>
                    <td><?= $m['especialidade'] ?></td>
                    <td>
                        <a href="index.php?v=mecanicos_lista&editar=<?= $m['id'] ?>" style="color: #f39c12;">Editar</a> | 
                        <a href="index.php?v=mecanicos_lista&excluir=<?= $m['id'] ?>" style="color: #e74c3c;" onclick="return confirm('Excluir este mecânico?')">Excluir</a>    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum mecânico cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<br>
<a href="index.php?v=mecanicos_cad" class="btn">Cadastrar Novo</a>