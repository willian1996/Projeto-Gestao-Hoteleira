<?php
if(empty($_GET['id'])){
    header("Location: ../index.php");
}
//puxando os arquivos conexao e classe hospede
require_once 'conexao.php';
require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede($pdo);

//pegando os valores do ajax 
$id = intval($_GET['id']);
$novoNovo = $_GET['nome'];
$novoCPF = $_GET['cpf'];
$novoEmail = $_GET['email'];
$novoTelefone = $_GET['telefone'];
$novoCelular = $_GET['celular'];

//chamando o metoto para alteração 
$retorno = $hospede->editarHospede($id, $novoNovo, $novoCPF, $novoEmail, $novoCelular, $novoTelefone );

//devolvendo resposta para o ajax 
echo json_encode($retorno);

    
    
    
    
    
    
    
    
    
    
    


