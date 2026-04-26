<?php
require_once "model/funcoes.php";

$acao = $_GET['acao'] ?? null;

if ($acao == 'add') {
    $id = $_GET['id'];
    if (isset($_SESSION['servicos_cadastrados'][$id])) {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
        $_SESSION['carrinho'][] = $_SESSION['servicos_cadastrados'][$id];
    }
    // Redireciona de volta para a view do carrinho
    header("Location: index.php?p=carrinho");
    exit;
}

if ($acao == 'limpar') {
    unset($_SESSION['carrinho']);
    header("Location: index.php?p=carrinho");
    exit;
}
