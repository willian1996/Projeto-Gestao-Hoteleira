<?php
require_once 'conexao.php';
require_once 'hospede.class.php';


$hospede = new Hospede($pdo);

if(!empty($_POST['email'])){
    $nome_completo = $_POST['nome_completo'];
    $CPF = $_POST['CPF'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    
    if($hospede->adicionarHospede($nome_completo, $CPF, $email, $celular, $telefone)){
        $id = $hospede->infoHospedePorEmail($email)['id'];
        
        header("Location: ../detalhes-hospede.php?id=$id");
    }else{
        echo "Erro ao cadastrar";
    }
}



