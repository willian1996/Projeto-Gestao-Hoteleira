<?php
require_once 'server/hospede.class.php';
require_once 'server/conexao.php';
$hospede = new Hospede($pdo);

if(isset($_GET['id']) and !empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $hospede->infoHospede($id);
}else{
    header("Location: lista-hospedes.php");
}
require_once 'header.php';
?>

<div class="container">
    
    <div class="detalhes-hospede">
        <h2>Detalhes do Hospede</h2>
        <a href="lista-hospedes.php">Voltar para lista</a>
        <table border="1px" width="400">
            <i onclick="excluirHospede(<?php echo $info['id']; ?>)" class="fas fa-trash-alt"></i>
            <i onclick="editarHospede(<?php echo $info['id']; ?>)" class="fas fa-user-edit"></i>
            <tr>
                <th>Nome</th>
                <td><strong><?php echo $info['nome_completo']; ?></strong></td> 
            </tr>
            <tr>
                <th>CPF</th>
                <td><?php echo $info['CPF']; ?></td> 
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $info['email']; ?></td> 
            </tr>
            <tr>
                <th>Telefone</th>
                <td><?php echo $info['telefone']; ?></td> 
            </tr>
            <tr>
                <th>Celular</th>
                <td><?php echo $info['celular']; ?></td> 
            </tr>
        </table><!--info-hospede-->
    </div><!--tabela-detalhes-hospede-->
</div><!--container-->


<?php
require_once 'footer.php';

?>