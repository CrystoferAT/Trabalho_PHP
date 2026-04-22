<?php
session_start();

if (!isset($_SESSION['mecanicos'])) {
    $_SESSION['mecanicos'] = [
        ['id' => 1, 'nome' => 'Carlos Silva', 'especialidade' => 'Motores'],
        ['id' => 2, 'nome' => 'Ana Souza', 'especialidade' => 'Injeção Eletrônica']
    ];
}

if (!isset($_SESSION['servicos'])) {
    $_SESSION['servicos'] = [
        ['id' => 1, 'descricao' => 'Troca de Óleo', 'total' => 150.00],
        ['id' => 2, 'descricao' => 'Alinhamento', 'total' => 80.00]
    ];
}

function validarLogin($user, $pass) {
    if (($user == 'admin' && $pass == 'admin') || ($user == 'user' && $pass == '123')) {
        $_SESSION['usuario'] = $user;
        return true;
    }
    return false;
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
?>
