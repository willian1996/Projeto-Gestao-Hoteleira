<?php
require_once 'funcionario.class.php';

$func = new Funcionario();

var_dump($func);

echo "<hr>";

$dados["nome"] = "Jose Bento";
$dados["email"] = "jose@gmail.com";
$dados["senha"] = "123";
$dados["id"] = "2";

//echo json_encode($func->inserir($dados));

echo $func->getStatus();







    


    

