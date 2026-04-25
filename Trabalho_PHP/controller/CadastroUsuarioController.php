<?php 


error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start(); 

require_once(__DIR__ . "/../model/funcoes.php"); 


if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}


$nome  = $_POST['nome']  ?? ''; 
$nivel = $_POST['nivel'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';


if(empty($nome) || empty($nivel) || empty($email) || empty($senha)) {
    echo "Erro: Todos os campos são obrigatórios!";
    echo '<br><a href="index.php?p=cadastro_usuarios">Voltar</a>';
    exit;
}


cadastrarUsuario($_SESSION['usuarios'], $nome, $nivel, $email, $senha);


header("Location: index.php?p=cadastro_usuarios");
exit;