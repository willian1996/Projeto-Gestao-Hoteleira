<?php
require_once 'conexao.php';
require_once 'hospede.class.php';


$hospede = new Hospede($pdo);


if(!empty($_GET['id'])){
    $id = intval($_GET['id']);
    if($hospede->excluirHospede($id)){
        $retorno['deucerto'] = true;
        $retorno['mensagem'] = "Parabens! excluiu!";
        echo json_encode($retorno);
        
    }else{
        $retorno['deucerto'] = false;
        $retorno['mensagem'] = "Erro ao excluir!";
        echo json_encode($retorno);
    }
    
    
    
    
    
}else{
    header("Location: ../lista-hospedes.php");
}
