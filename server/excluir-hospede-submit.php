<?php
if(empty($_GET['id'])){
    header("Location: ../index.php");
}

require_once 'conexao.php';
require_once 'hospede.class.php';


$hospede = new Hospede($pdo);



$id = intval($_GET['id']);
if($hospede->excluirHospede($id)){
    $retorno['deucerto'] = true;
    $retorno['mensagem'] = "Hospede excluído!";
    echo json_encode($retorno);

}else{
    $retorno['deucerto'] = false;
    $retorno['mensagem'] = "Erro no servidor!";
    echo json_encode($retorno);
}

    
    

    

