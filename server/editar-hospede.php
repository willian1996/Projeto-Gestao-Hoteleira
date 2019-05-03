<?php
require_once 'conexao.php';
require_once 'hospede.class.php';

$hospede = new Hospede($pdo);

if(!empty($_GET['id'])){
    $id = intval($_GET['id']);
    $novoNovo = $_GET['nome'];
    $novoCPF = $_GET['cpf'];
    $novoEmail = $_GET['email'];
    $novoTelefone = $_GET['telefone'];
    $novoCelular = $_GET['celular'];
    
    if($hospede->editarHospede($id, $novoNovo, $novoCPF, $novoEmail, $novoCelular, $novoTelefone )){
        $retorno['deucerto'] = true;
        $retorno['mensagem'] = "hospede editado";
        echo json_encode($retorno);
    }else{
        $retorno['deucerto'] = false;
        $retorno['mensagem'] = "Erro no servidor!";
        echo json_encode($retorno);
    }
    
    
    
    
    
    
    
    
    
    
    
}else{
    header("Location: ../lista-hospedes.php");
}

