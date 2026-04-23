<?php
if(session_status() === PHP_SESSION_NONE){
        session_start();
    }


if (!isset($_SESSION['mecanicos'])) {
    $_SESSION['mecanicos'] = [
        ['id' => 1, 'nome' => 'Carlos Silva', 'especialidade' => 'Motores'],
        ['id' => 2, 'nome' => 'Ana Souza', 'especialidade' => 'Injeção Eletrônica']
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
            $_SESSION['servicos_cadastrados'][$indice] = $novosDados;
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

?>
