<?php
if(empty($_POST['id'])){
    header("Location: ../index.php");
}
//puxando os arquivos conexao e classe hospede
require_once 'conexao.php';
require_once 'hospede.class.php';

//estanciando o obj hospede 
$hospede = new Hospede($pdo);

//pegando os valores do ajax 
$id = intval($_POST['id']);
$novoNovo = $_POST['nome'];
$novoCPF = $_POST['cpf'];
$novoEmail = $_POST['email'];
$novoTelefone = $_POST['telefone'];
$novoCelular = $_POST['celular'];

//chamando o metoto para alteração 
$retorno = $hospede->editarHospede($id, $novoNovo, $novoCPF, $novoEmail, $novoCelular, $novoTelefone );

//devolvendo resposta para o ajax 
echo json_encode($retorno);

    
    
    
    
    
    
    
    
    
    
    


