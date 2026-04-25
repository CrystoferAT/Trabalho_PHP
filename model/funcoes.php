<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [
        ['nome' => 'Cliente Padrao', 'email' => 'cliente@oficina.com', 'senha' => '123', 'nivel' => 'cliente']
    ];
}

if (!isset($_SESSION['mecanicos'])) {
    $_SESSION['mecanicos'] = [
        ['id' => 1, 'nome' => 'Carlos Silva', 'especialidade' => 'Motores'],
        ['id' => 2, 'nome' => 'Ana Souza', 'especialidade' => 'Injeção Eletrônica']
    ];
}

function validarLogin($user, $pass) {
    if (empty($user) || empty($pass)) {
        return false;
    }

    if ($user === 'admin' && $pass === 'admin') {
        $_SESSION['usuario'] = ['nome' => 'Administrador', 'email' => 'admin', 'nivel' => 'admin'];
        return true;
    }

    foreach ($_SESSION['clientes'] as $cliente) {
        if ($cliente['email'] === $user && $cliente['senha'] === $pass) {
            $_SESSION['usuario'] = $cliente;
            return true;
        }
    }
    
    return false;
}

function cadastrarCliente($nome, $email, $senha) {
    if (empty($nome) || empty($email) || empty($senha)) {
        return false;
    }

    foreach ($_SESSION['clientes'] as $c) {
        if ($c['email'] === $email) return false;
    }

    $_SESSION['clientes'][] = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha,
        'nivel' => 'cliente'
    ];
    return true;
}

function estaLogado() {
    return isset($_SESSION['usuario']);
}

function cadastrarMecanico($nome, $especialidade) {
    $novoMecanico = [
        'id' => count($_SESSION['mecanicos']) + 1,
        'nome' => $nome,
        'especialidade' => $especialidade
    ];
    $_SESSION['mecanicos'][] = $novoMecanico;
}

function formatarMoeda($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}

if(!isset($_SESSION['servicos_cadastrados'])){
    $_SESSION['servicos_cadastrados']=[];
}

function salvarServico($dados){
    $total = (float)$dados['precoServico']+(float)$dados['precoPeca'];
    $novoServico = [
        'servico' => $dados['servico'],
        'tempo' => $dados['tempo'],
        'precoServico' => (float)$dados['precoServico'],
        'pecas' => $dados['pecas'],
        'precoPeca' => (float)$dados['precoPeca'],
        'valorTotal' => $total
    ];
    $_SESSION['servicos_cadastrados'][] = $novoServico;
}

function listarServicos(){
    return $_SESSION['servicos_cadastrados']?? [];
}

function editarServicos($indice, $novosDados){
    if(isset($_SESSION['servicos_cadastrados'][$indice])){
        $total = (float)$novosDados['precoServico']+(float)$novosDados['precoPeca'];
        $_SESSION['servicos_cadastrados'][$indice] = [
            'servico'       => $novosDados['servico'],
            'precoServico'  => (float)$novosDados['precoServico'],
            'pecas'         => $novosDados['pecas'],
            'precoPeca'     => (float)$novosDados['precoPeca'],
            'valorTotal'    => $total
        ];
        return true;        
    }
    return false;
}

function excluirServicos($indice){
    if(isset($_SESSION['servicos_cadastrados'][$indice])){
        unset($_SESSION['servicos_cadastrados'][$indice]);
        $_SESSION['servicos_cadastrados'] = array_values($_SESSION['servicos_cadastrados']);
        return true;
    }
    return false;
}

function gerarCaptcha() {
    $n1 = rand(1, 9);
    $n2 = rand(1, 9);
    $_SESSION['captcha_soma'] = $n1 + $n2;
    return "Quanto é $n1 + $n2?";
}
?>

