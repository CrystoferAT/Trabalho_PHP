<?php
    require_once"../model/funcoes.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['salvar'])){

        $paginaAtual = isset($_POST['pagina_origem']) ? $_POST['pagina_origem'] : 'cadastro_servicos';
        
        if(isset($_POST['indice_edicao']) && $_POST['indice_edicao'] !== ''){
            editarServicos($_POST['indice_edicao'], $_POST);

            header("Location: ../index.php?p=servicos");
        }else{
            salvarServico($_POST);
            header("Location: ../index.php?p=" . $paginaAtual . "&status=sucesso");
        }
        exit();
    }

    if(isset($_GET['excluir'])){
        excluirServicos($_GET['excluir']);
        header("Location: ../index.php?p=servicos");
        exit();
    }
?>