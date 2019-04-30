<?php
require_once 'conexao.php';
require_once '../classes/hospede.class.php';


$hospede = new Hospede($pdo);

if(!empty($_POST['email'])){
    $nome_completo = $_POST['nome_completo'];
    $CPF = $_POST['CPF'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    
    if($hospede->adicionarHospede($nome_completo, $CPF, $email, $celular)){
        echo "Hospede cadastrado";
    }else{
        echo "Erro ao cadastrar";
    }
}



