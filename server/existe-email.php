<?php
if(empty($_GET['email'])){
    header("Location: ../index.php");
}
//puxando o arquivo classe hospede

require_once 'hospede.class.php';


//estanciando o obj hospede 
$hospede = new Hospede();

//pegando o email do ajax
$email = $_GET['email'];

//verificando se o email está cadastrado no banco de dados
if($hospede->existeEmail($email)){
    $retorno['existe'] = true;
    $retorno['mensagem'] = "E-mail esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}else{
    $retorno['existe'] = false;
    $retorno['mensagem'] = "E-mail nao esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}




