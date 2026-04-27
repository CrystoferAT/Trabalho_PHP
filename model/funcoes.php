<?php
if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

function validarLogin($email, $pass) {
    // 1. Procurar em USUÁRIOS (Admins/Funcionários)
    if (isset($_SESSION['usuarios'])) {
        foreach ($_SESSION['usuarios'] as $u) {
            if ($u['email'] === $email && $u['senha'] === $pass) {
                $_SESSION['usuario_nome'] = $u['nome'];
                $_SESSION['usuario_nivel'] = $u['nivel']; // admin ou funcionario
                $_SESSION['autenticado'] = true;
                return true;
            }
        }
    }

    // 2. Procurar em CLIENTES
    if (isset($_SESSION['clientes'])) {
        foreach ($_SESSION['clientes'] as $c) {
            if ($c['email'] === $email && $c['senha'] === $pass) {
                $_SESSION['usuario_nome'] = $c['nome'];
                $_SESSION['usuario_nivel'] = 'cliente'; // Nível fixo para clientes
                $_SESSION['autenticado'] = true;
                return true;
            }
        }
    }
    
    return false;
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
    function cadastrarUsuario($dadosUsuario){
        if(!isset($_SESSION['usuarios'])){
            $_SESSION['usuarios'] = [];
        }
        
        $proximoId = count($_SESSION['usuarios']) + 1;
        $usuario = [
            'id'    =>$proximoId,
            'nome'  => $dadosUsuario['nome'],
            'nivel' => $dadosUsuario['nivel'],
            'email' => $dadosUsuario['email'],
            'senha' => $dadosUsuario['senha']
        ];

        $_SESSION['usuarios'][] = $usuario; 
    }


    function gerarCaptcha() {
        $n1 = rand(1, 9);
        $n2 = rand(1, 9);
        $_SESSION['captcha_soma'] = $n1 + $n2;
        return "Quanto é $n1 + $n2?";
    }


function cadastrarCliente($nome, $email, $senha) {
    // 1. Verifica se os campos estão realmente preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        return false; 
    }

    // 2. Cria a lista de clientes na sessão caso ela ainda não exista
    if (!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = [];
    }

    // 3. Verifica se o e-mail já está cadastrado na lista da sessão
    foreach ($_SESSION['clientes'] as $c) {
        if ($c['email'] === $email) {
            return false; // Para tudo e retorna falso se o e-mail já existir
        }
    }

    // 4. Salva o novo cliente na sessão
    $_SESSION['clientes'][] = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha, // Em um sistema real, use password_hash
        'nivel' => 'cliente'
    ];

    // 5. AGORA SIM retorna verdadeiro para o redirecionamento acontecer
    return true; 
}

function listarClientes(){
        return $_SESSION['clientes']?? [];
        }

function listarUsuarios(){
        return $_SESSION['usuarios']?? [];
        }

// Adicione ao final do seu model/funcoes.php

/**
 * Adiciona um serviço ao orçamento (carrinho)
 */
function adicionarAoOrcamento($indice) {
    // Busca a lista de serviços cadastrados
    $servicos = listarServicos();
    
    // Verifica se o serviço realmente existe antes de adicionar
    if (isset($servicos[$indice])) {
        if (!isset($_SESSION['orcamento_atual'])) {
            $_SESSION['orcamento_atual'] = [];
        }
        
        // Adiciona uma cópia do serviço ao orçamento
        $_SESSION['orcamento_atual'][] = $servicos[$indice];
        return true;
    }
    return false;
}

/**
 * Retorna os itens do orçamento atual
 */
function listarItensOrcamento() {
    return $_SESSION['orcamento_atual'] ?? [];
}

/**
 * Calcula o valor total do orçamento
 */
function calcularTotalOrcamento() {
    $itens = listarItensOrcamento();
    $total = 0;
    foreach ($itens as $item) {
        $total += $item['valorTotal'];
    }
    return $total;
}

/**
 * Limpa o orçamento atual
 */
function limparOrcamento() {
    unset($_SESSION['orcamento_atual']);
}

function removerDoOrcamento($indice) {
    if (isset($_SESSION['orcamento_atual'][$indice])) {
        unset($_SESSION['orcamento_atual'][$indice]);
        // Reorganiza os índices para não deixar buracos no array
        $_SESSION['orcamento_atual'] = array_values($_SESSION['orcamento_atual']);
        return true;
    }
    return false;
}
?>
