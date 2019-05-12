<?php
if(empty($_GET['emailFunc'])){
    header("Location: ../index.php");
}

require_once 'funcionario.class.php';

$funcionario = new Funcionario();

// var_dump($funcionario);



$dados["email"] = $_GET['emailFunc'];
$dados["senha"] = $_GET['senhaFunc'];


$retorno = $funcionario->logarFuncionario($dados);


echo json_encode($retorno);







    


    

