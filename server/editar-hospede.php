<?php
require_once 'conexao.php';
require_once 'hospede.class.php';

$hospede = new Hospede($pdo);

if(!empty($_GET['id'])){
    $id = intval($_GET['id']);
    
    
    
    
    
    
}else{
    header("Location: ../lista-hospedes.php");
}

