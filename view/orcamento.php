<div class="container">
    <h2>Serviços Disponíveis para Orçamento</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $servicos = listarServicos();
            foreach ($servicos as $indice => $item): 
            ?>
                <tr>
                    <td><?= $item['servico'] ?></td>
                    <td><?= formatarMoeda($item['valorTotal']) ?></td>
                    <td>
                        <a href="index.php?p=carrinho&acao=add&id=<?php echo $indice; ?>">Adicionar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
