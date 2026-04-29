<?php
    require_once "../model/funcoes.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pagar'])) {
        $metodo = $_POST['metodo_pagamento'];

        sleep(2); 

        $idPedido = finalizarPagamento($metodo);

        header("Location: ../index.php?p=sucesso&pedido=" . $idPedido);
        exit();
    } else {
        header("Location: ../index.php");
        exit();
    }
?>