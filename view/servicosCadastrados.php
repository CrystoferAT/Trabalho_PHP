<?php
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'servicos';
?>

<div class="card shadow-sm border-0 mt-3">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 text-uppercase fw-bold">
            <i class="bi bi-list-check me-2 text-primary"></i>Gerenciamento de Serviços
        </h5>
        <a href="index.php?p=cadastro_servicos" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Novo Serviço
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Serviço / Técnico</th>
                        <th>Peça Utilizada</th>
                        <th class="text-end">Mão de Obra</th>
                        <th class="text-end">Custo Peça</th>
                        <th class="text-end text-primary">Valor Total</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servicos = listarServicos();
                    if(empty($servicos)): 
                    ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Nenhum serviço cadastrado no sistema.
                        </td>
                    </tr>
                    <?php else: foreach($servicos as $indice => $s): ?>
                    <tr>
                        <td class="ps-4">
                            <span class="fw-bold d-block text-dark"><?= $s['servico'] ?></span>
                            <small class="text-muted">OS #<?= str_pad($indice + 1, 4, '0', STR_PAD_LEFT) ?></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border fw-normal"><?= $s['pecas'] ?></span>
                        </td>
                        <td class="text-end"><?= formatarMoeda($s['precoServico']) ?></td>
                        <td class="text-end"><?= formatarMoeda($s['precoPeca']) ?></td>
                        <td class="text-end fw-bold text-success"><?= formatarMoeda($s['valorTotal']) ?></td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $indice ?>">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <a href="controller/servicosController.php?excluir=<?= $indice ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Deseja realmente excluir este serviço?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>

                            <div class="modal fade text-start" id="editModal<?= $indice ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Editar Serviço #<?= $indice + 1 ?></h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="controller/servicosController.php" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="indice_edicao" value="<?= $indice ?>">
                                                
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold small">Nome do Serviço:</label>
                                                    <input type="text" name="servico" class="form-control" value="<?= $s['servico'] ?>" required>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold small">Mão de Obra (R$):</label>
                                                        <input type="number" step="0.01" name="precoServico" class="form-control" value="<?= $s['precoServico'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold small">Preço Peça (R$):</label>
                                                        <input type="number" step="0.01" name="precoPeca" class="form-control" value="<?= $s['precoPeca'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold small">Peça:</label>
                                                    <input type="text" name="pecas" class="form-control" value="<?= $s['pecas'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="salvar" class="btn btn-primary btn-sm px-4">Salvar Alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>