<?php
if(empty($_POST['id'])){
    header("Location: ../index.php");
}
//puxando os arquivos conexao e classe hospede
require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede();

//pegando os valores do ajax 
$dados["id"] = intval($_POST['id']);
$dados["novoNome"] = $_POST['nome'];
$dados["novoCPF"] = $_POST['cpf'];
$dados["novoEmail"] = $_POST['email'];
$dados["novoTelefone"] = $_POST['telefone'];
$dados["novoCelular"] = $_POST['celular'];

//chamando o metoto para alteração 
$retorno = $hospede->editarHospede($dados);

//devolvendo resposta para o ajax 
echo json_encode($retorno);

    
    
    
    
    
    
    
    
    
    
    


