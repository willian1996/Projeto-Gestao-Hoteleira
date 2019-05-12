<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'server/hospede.class.php';
$hospede = new Hospede();

if(isset($_GET['id']) and !empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $hospede->infoHospede($id);
}else{
    header("Location: lista-hospedes.php");
}
require_once 'header.php';
?>

<div class="container">
    <a href="lista-hospedes.php">Voltar para lista</a>
    
    <div class="detalhes-hospede"> 
        <h2>Informações do Hospede</h2>
        
        <i id="excluirHospede" onclick="excluirHospede(<?php echo $info['id']; ?>)" class="fas fa-trash-alt"></i>
        <i id="editarHospede" onclick="editarHospede(<?php echo $info['id']; ?>)" class="fas fa-user-edit"></i>
        <table id="tabela-info-hospede">
            <tr>
                <th>Nome</th>
                <td id="tdNome"><?php echo $info['nome_completo']; ?></td> 
            </tr>
            <tr>
                <th>CPF</th>
                <td id="tdCPF"><?php echo $info['CPF']; ?></td> 
            </tr>
            <tr>
                <th>Email</th>
                <td id="tdEmail"><?php echo $info['email']; ?></td> 
            </tr>
            <tr>
                <th>Telefone</th>
                <td id="tdTelefone"><?php echo $info['telefone']; ?></td> 
            </tr>
            <tr>
                <th>Celular</th>
                <td id="tdCelular"><?php echo $info['celular']; ?></td> 
            </tr>
            <tr>
                <th>Cadastrado</th>
                <td id="tdCelular"><?php echo date('d/m/y H:i', strtotime($info['dataCadastro']));  ?></td> 
            </tr>
        </table><!--info-hospede-->
    </div><!--tabela-detalhes-hospede-->
    
    
    
    
    
    
    
    
    
    
    
</div><!--container-->


<?php
require_once 'footer.php';

?>