<?php
if(empty($_POST['id'])){
    header("Location: ../index.php");
}
//puxando o arquivo classe hospede

require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede();


//pegando o id do ajax
$id = intval($_POST['id']);

//chamando o metodo para excluir
$retorno = $hospede->excluirHospede($id);

//devolvendo resposta para o ajax 
echo json_encode($retorno);


    
    

    

