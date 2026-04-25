<?php

if (isset($_GET['excluir'])) {
    $idExcluir = $_GET['excluir'];
    
    foreach ($_SESSION['servicos'] as $key => $servico) {
        if ($servico['id'] == $idExcluir) {
            unset($_SESSION['servicos'][$key]);
            // Reorganiza o array para não deixar buracos nos índices
            $_SESSION['servicos'] = array_values($_SESSION['servicos']);
            echo "<script>alert('Serviço excluído!'); window.location.href='index.php?v=servicos_lista';</script>";
            exit;
        }
    }
}

$servicos = $_SESSION['servicos'] ?? [];
?>

<h2>Relatório de Serviços Realizados</h2>
<p>Consulte aqui todos os serviços lançados no sistema.</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição do Serviço</th>
            <th>Valor Total</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($servicos) > 0): ?>
            <?php foreach ($servicos as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= $s['data'] ?? date('d/m/Y') ?></td>
                    <td><?= $s['descricao'] ?></td>
                    <td><strong>R$ <?= number_format($s['total'], 2, ',', '.') ?></strong></td>
                    <td>
                        <!-- Exemplo de uso de GET para futuras ações -->
                        <a href="index.php?v=servicos_detalhes&id=<?= $s['id'] ?>" style="color: #3498db;">Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center;">Nenhum serviço encontrado no histórico.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div style="margin-top: 20px;">
    <a href="index.php?v=servicos_cad" class="btn" style="background: #27ae60; color: white; padding: 10px; text-decoration: none; border-radius: 4px;">+ Lançar Novo Serviço</a>
</div>
