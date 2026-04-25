<?php
require_once "model/funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   
    if (isset($_POST['acao']) && $_POST['acao'] === 'login') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $usuario = validarLogin($email, $senha);
        
        if ($usuario) {
            $_SESSION['usuario_logado'] = $usuario;
            header("Location: index.php?p=dashboard");
            exit;
        } else {
            header("Location: index.php?p=login&erro=1");
        }
    }

    


    
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $sucesso = cadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        if ($sucesso) {
            header("Location: index.php?p=login&msg=sucesso");
        } else {
            header("Location: index.php?p=cadastro_usuario&erro=email_existe");
        }
    }
}