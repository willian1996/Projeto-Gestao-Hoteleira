<?php
if(empty($_POST['email'])){
    header("Location: ../index.php");
}
//puxando o arquivo classe hospede
require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede();


//pegando os valores do ajax 
$dados["novoNome"] = $_POST['nome'];
$dados["novoCPF"] = $_POST['cpf'];
$dados["novoEmail"] = $_POST['email'];
$dados["novoTelefone"] = $_POST['telefone'];
$dados["novoCelular"] = $_POST['celular'];

//chamando o metoto para alteração 
$retorno = $hospede->cadastrarHospede($dados);

//devolvendo resposta para o ajax 
echo json_encode($retorno);
    

        
    


