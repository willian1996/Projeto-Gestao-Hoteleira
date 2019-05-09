<?php
if(empty($_GET['cpf'])){
    header("Location: ../index.php");
}
//puxando o arquivo classe hospede
require_once 'hospede.class.php';


//estanciando o obj hospede 
$hospede = new Hospede();

//pegando o CPF do ajax
$CPF = intval($_GET['cpf']);

//verificando se o CPF está cadastrado no banco de dados
if($hospede->existeCPF($CPF)){
    $retorno['existe'] = true;
    $retorno['mensagem'] = "CPF esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}else{
    $retorno['existe'] = false;
    $retorno['mensagem'] = "CPF nao esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}




