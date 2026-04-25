<?php
    include_once "model/funcoes.php";
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'servicos';
?>

<h1>Gerênciamento de Serviços</h1>
    <table border="1" style="width: 100%; text-align: left; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Preço</th>
                <th>Peça</th>
                <th>Preço da Peça</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servicos = listarServicos();

            if(empty($servicos)): 
            ?>
            <tr>
                <td colspan = "6">Nenhum Serviço Cadastrado</td>
            </tr>

            <?php
                else:
                    foreach($servicos as $indice => $s): 
            ?>
            <tr>
                <td><?= $s['servico'] ?></td>
                <td><?= formatarMoeda($s['precoServico']) ?></td>
                <td><?= $s['pecas'] ?></td>
                <td><?= formatarMoeda($s['precoPeca']) ?></td>
                <td><?= formatarMoeda($s['valorTotal']) ?></td>
                <td>
                    <details>
        <summary style="cursor: pointer; color: blue; text-decoration: underline;">
            Editar
        </summary>
        
        <div style="border: 1px solid #ccc; padding: 10px; margin-top: 5px; background: #f9f9f9;">
            <form action="controller/servicosController.php" method="POST">
                <input type="hidden" name="indice_edicao" value="<?= $indice ?>">
                
                <small>Serviço:</small><br>
                <input type="text" name="servico" value="<?= $s['servico'] ?>" required><br>
                
                <small>Preço:</small><br>
                <input type="number" name="precoServico" value="<?= $s['precoServico'] ?>" required><br><br>

                <small>Peça:</small><br>
                <input type="text" name="pecas" value="<?= $s['pecas'] ?>" required><br><br>

                <small>Preço Peça:</small><br>
                <input type="number" step="0.01" name="precoPeca" value="<?= $s['precoPeca'] ?>" required><br><br>

                
                <button type="submit" name="salvar">Atualizar</button>
            </form>
        </div>
    </details>

    <a href="controller/servicosController.php?excluir=<?= $indice ?>" 
       onclick="return confirm('Deseja realmente excluir este serviço?')">
       Excluir
    </a>
                </td>

            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>