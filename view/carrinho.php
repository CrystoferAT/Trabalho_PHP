<?php
  $pagina = isset($_GET['p']) ? $_GET['p'] : 'Carrinho'; 

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    
    if ($acao === 'add' && isset($_GET['id'])) {
        adicionarAoOrcamento($_GET['id']);
    } 
    elseif ($acao === 'remover' && isset($_GET['id'])) {
        removerDoOrcamento($_GET['id']);
    } 
    elseif ($acao === 'limpar') {
        limparOrcamento();
    }
    
    
    header("Location: index.php?p=Carrinho");
    exit;
}

$itensNoOrcamento = listarItensOrcamento();
$totalGeral = calcularTotalOrcamento();
?>
<?php if (isset($_GET['status']) && $_GET['status'] === 'sucesso'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i> Serviço adicionado ao orçamento!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">
            <i class="bi bi-cart3 text-primary me-2"></i>Seu Orçamento
        </h2>
        <div>
            <a href="index.php?p=orcamento" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-arrow-left"></i> Adicionar mais serviços
            </a>
            <?php if (!empty($itensNoOrcamento)): ?>
                <a href="index.php?p=Carrinho&acao=limpar" class="btn btn-danger btn-sm shadow-sm" 
                   onclick="return confirm('Deseja realmente limpar todo o orçamento?')">
                    <i class="bi bi-trash"></i> Limpar Tudo
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Serviço</th>
                            <th>Mão de Obra</th>
                            <th>Peças</th>
                            <th>Subtotal</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($itensNoOrcamento)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-cart-x fs-1"></i>
                                        <p class="mt-2">Seu orçamento está vazio no momento.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($itensNoOrcamento as $indice => $item): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold"><?= $item['servico'] ?></div>
                                        <small class="text-muted"><?= $item['pecas'] ?></small>
                                    </td>
                                    <td><?= formatarMoeda($item['precoServico']) ?></td>
                                    <td><?= formatarMoeda($item['precoPeca']) ?></td>
                                    <td class="fw-bold text-primary"><?= formatarMoeda($item['valorTotal']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?p=Carrinho&acao=remover&id=<?= $indice ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           title="Remover este item">
                                            <i class="bi bi-x-circle"></i> Retirar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <?php if (!empty($itensNoOrcamento)): ?>
                        <tfoot class="table-group-divider">
                            <tr class="table-light">
                                <td colspan="3" class="text-end fw-bold py-3 fs-5">Valor Total do Orçamento:</td>
                                <td colspan="2" class="fw-bold text-primary py-3 fs-4">
                                    <?= formatarMoeda($totalGeral) ?>
                                </td>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <?php if (!empty($itensNoOrcamento)): ?>
        <div class="mt-4 d-flex justify-content-end">
            <button class="btn btn-success btn-lg px-5 shadow fw-bold" onclick="window.print()">
                <i class="bi bi-printer me-2"></i>Imprimir Orçamento
            </button>

            <a href="index.php?p=pagamento" class="btn btn-success btn-lg px-5 shadow fw-bold">
                <i class="bi bi-credit-card me-2"></i>Finalizar Pagamento
            </a>
        </div>
    <?php endif; ?>
</div>
