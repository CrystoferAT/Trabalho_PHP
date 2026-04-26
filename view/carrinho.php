<div class="container">
    <h2>Itens do Orçamento</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            if (!empty($_SESSION['carrinho'])): 
                foreach ($_SESSION['carrinho'] as $item): 
                    $total += $item['valorTotal'];
            ?>
                <tr>
                    <td><?= $item['servico'] ?></td>
                    <td><?= formatarMoeda($item['valorTotal']) ?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?= formatarMoeda($total) ?></strong></td>
                </tr>
            <?php else: ?>
                <tr><td colspan="2">Nenhum item selecionado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php?p=orcamento">Voltar ao Catálogo</a> | 
    <a href="index.php?p=carrinho&acao=limpar">Limpar Tudo</a>
</div>