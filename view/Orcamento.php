<?php
    include "model/funcoes.php";
    $pagina = isset($_GET['p']) ? $_GET['p'] : 'orcamento';
?>
<div>
    <?php
        listarServicos();
    ?>
</div>