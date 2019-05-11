<?php
if(empty($_POST['emailFunc'])){
    header("Location: ../index.php");
}

require_once 'funcionario.class.php';

$funcionario = new Funcionario();


$dados['nome'] = $_POST['nomeFunc'];
$dados['email'] = $_POST['emailFunc'];
$dados['senha'] = $_POST['senhaFunc'];



$retorno = $funcionario->inserirFuncionario($dados);

echo json_encode($retorno);


