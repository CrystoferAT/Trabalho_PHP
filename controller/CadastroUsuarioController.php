<?php 

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once "../model/funcoes.php"; 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])){
        $dadosUsuario = [
        'nome'  => $_POST['nome'],
        'nivel' => $_POST['nivel'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha'] 
    ];

    cadastrarUsuario($dadosUsuario);
        
    header("Location: ../index.php?p=cadastro_usuarios");
        exit;
    }

?>