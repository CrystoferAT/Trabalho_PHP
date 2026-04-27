<?php
if(session_status() === PHP_SESSION_NONE) session_start();
require_once "../model/funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'login') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $captcha_usuario = $_POST['captcha'];

        // 1. Valida Captcha
        if ($captcha_usuario != $_SESSION['captcha_soma']) {
            header("Location: ../index.php?p=login&erro=captcha");
            exit;
        }

        // 2. Valida Login (usando a função que busca em Usuários e Clientes)
        if (validarLogin($email, $senha)) {
            // Se validarLogin retornar true, ela já setou $_SESSION['usuario_nivel']
            header("Location: ../index.php?p=home");
            exit;
        } else {
            header("Location: ../index.php?p=login&erro=dados");
            exit;
        }
    }
}