<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-5 mb-4"><i class="bi bi-wrench-adjustable me-2"></i>Cadastro de Serviços</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Novo Serviço</h5>
                </div>
                <div class="card-body">
                    <form action="controller/ServicosController.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Serviço Técnico</label>
                            <input type="text" name="servico" class="form-control" placeholder="Ex: Troca de Óleo" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempo (min)</label>
                                <input type="number" name="tempo" class="form-control" placeholder="Ex: 40">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mão de Obra (R$)</label>
                                <input type="number" step="0.01" name="precoServico" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Peças Utilizadas</label>
                            <input type="text" name="pecas" class="form-control" placeholder="Ex: Filtro, Óleo 5W30" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço das Peças (R$)</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" step="0.01" name="precoPeca" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="salvar" class="btn btn-success">
                                <i class="bi bi-check-lg"></i> Salvar Serviço
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">Serviços Cadastrados</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Serviço</th>
                                    <th class="text-end">Valor Total</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(listarServicos() as $s): ?>
                                    <tr>
                                        <td>
                                            <strong><?= $s['servico'] ?></strong><br>
                                            <small class="text-muted">Peças: <?= $s['pecas'] ?></small>
                                        </td>
                                        <td class="text-end fw-bold text-success">
                                            R$ <?= number_format($s['valorTotal'], 2, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>