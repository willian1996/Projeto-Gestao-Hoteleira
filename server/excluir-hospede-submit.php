<?php
if(empty($_POST['id'])){
    header("Location: ../index.php");
}
//puxando os arquivos conexao e classe hospede
require_once 'conexao.php';
require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede($pdo);


//pegando o id do ajax
$id = intval($_POST['id']);

//chamando o metoto para excluir
$retorno = $hospede->excluirHospede($id);

//devolvendo resposta para o ajax 
echo json_encode($retorno);


    
    

    

