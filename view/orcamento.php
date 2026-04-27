<?php
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'orcamento';
    // Certifique-se de que a model está acessível
    $servicos = listarServicos();
?>
    <?php if (isset($_GET['status']) && $_GET['status'] === 'sucesso'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i> Serviço adicionado ao orçamento!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="bi bi-calculator me-2 text-primary"></i>Orçamentos</h2>
        <a href="index.php?p=Carrinho" class="btn btn-outline-dark shadow-sm">
            <i class="bi bi-cart-fill me-1"></i> Ver Itens Selecionados
        </a>
    </div>


    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">Serviço / Descrição</th>
                            <th>Mão de Obra</th>
                            <th>Peças</th>
                            <th>Total</th>
                            <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($servicos)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    Nenhum serviço cadastrado no sistema.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($servicos as $indice => $item): ?>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark"><?= $item['servico'] ?></span><br>
                                        <small class="text-muted"><?= $item['pecas'] ?></small>
                                    </td>
                                    <td><?= formatarMoeda($item['precoServico']) ?></td>
                                    <td><?= formatarMoeda($item['precoPeca']) ?></td>
                                    <td class="fw-bold text-primary"><?= formatarMoeda($item['valorTotal']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?p=Carrinho&acao=add&id=<?= $indice ?>" 
                                           class="btn btn-primary btn-sm px-3 rounded-pill shadow-sm">
                                            <i class="bi bi-plus-lg me-1"></i> Adicionar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>