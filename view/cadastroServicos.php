<?php
    $pagina = isset($_GET['p']) ? $_GET['p']: 'cadastro_servicos';
?>
    <h1>Cadastro de Serviços</h1>
    
    <form action="controller/ServicosController.php" method="POST">
        Serviço Técnico: <input type="text" name="servico" required><br><br>
        Tempo: <input type="number" name="tempo"><br><br>
        Preco: <input type="number" name="precoServico" required><br><br>
        Peças: <input type="text" name="pecas" required>
        Preço: <input type="text" name="precoPeca" required><br><br>
        <br><br>

        <button type="submit" name="salvar">Salvar</button>
        
    </form>

    <h3>Lista de Serviços:</h3>

    <ul>
        <?php
            foreach(listarServicos() as $s){
                echo"<li>{$s['servico']} - R$ {$s['valorTotal']}</li>";
            }
        ?>
    </ul>
