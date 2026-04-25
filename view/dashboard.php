<div class="cards">
    <div class="card">
        <h3>Mecânicos</h3>
        <p><?= count($_SESSION['mecanicos']) ?></p>
    </div>
    <div class="card">
        <h3>Serviços Ativos</h3>
        <p><?= count($_SESSION['servicos']) ?></p>
    </div>
</div>

<h3>Últimos Registros (Mecânicos)</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Especialidade</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $mecanicos = $_SESSION['mecanicos'];
        $total = count($mecanicos);
        for ($i = $total - 1; $i >= max(0, $total - 3); $i--): ?>
            <tr>
                <td><?= $mecanicos[$i]['id'] ?></td>
                <td><?= $mecanicos[$i]['nome'] ?></td>
                <td><?= $mecanicos[$i]['especialidade'] ?></td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
