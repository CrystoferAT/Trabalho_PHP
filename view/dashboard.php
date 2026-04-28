<?php  $pagina = isset($_GET['p']) ? $_GET['p'] : 'dash'; 

$listaServicos = listarServicos();
$listaUsuarios = listarUsuarios(); // Funcionários
$listaClientes = listarClientes(); 
?>

<div class="row mb-4">
    <div class="col-12 text-center text-lg-start">
        <h2 class="fw-bold"><i class="bi bi-speedometer2 me-2"></i>Painel de Controle</h2>
        <p class="text-muted">Resumo geral das atividades da oficina.</p>
    </div>
</div>

<div class="row g-4">
    
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-primary"><i class="bi bi-person-badge me-2"></i>Equipe / Funcionários</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase">
                            <tr>
                                <th class="ps-3">Nome</th>
                                <th>Nível</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($listaUsuarios)): ?>
                                <tr><td colspan="3" class="text-center py-4 text-muted small">Nenhum funcionário cadastrado.</td></tr>
                            <?php else: foreach($listaUsuarios as $user): ?>
                                <tr>
                                    <td class="ps-3 fw-semibold"><?= htmlspecialchars($user['nome']) ?></td>
                                    <td><span class="badge rounded-pill bg-info-subtle text-info border border-info-subtle"><?= ucfirst($user['nivel']) ?></span></td>
                                    <td class="text-muted small"><?= htmlspecialchars($user['email']) ?></td>
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-success"><i class="bi bi-people me-2"></i>Clientes</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase">
                            <tr>
                                <th class="ps-3">Nome do Cliente</th>
                                <th>E-mail de Contato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($listaClientes)): ?>
                                <tr><td colspan="2" class="text-center py-4 text-muted small">Nenhum cliente cadastrado.</td></tr>
                            <?php else: foreach($listaClientes as $cli): ?>
                                <tr>
                                    <td class="ps-3 fw-semibold"><?= htmlspecialchars($cli['nome']) ?></td>
                                    <td class="text-muted small"><?= htmlspecialchars($cli['email']) ?></td>
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>