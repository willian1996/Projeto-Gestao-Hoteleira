<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'server/hospede.class.php';
$hospede = new Hospede();
$listaHospede = $hospede->listarHospedes();

require_once 'header.php';
?>

<div class="container">
    <a href="cadastrar-hospede.php">Novo Hóspede</a>
    <div class="lista-hospedes">
        <table>
            <tr>
                <th>Nome do Hóspede</th>
                <th>CPF</th>
                <th class="lastCol">E-Mail</th>
                
            </tr>
            <?php
            
            foreach($listaHospede as $valor):
            ?>
            <tr>
                <td><a href="detalhes-hospede.php?id=<?php echo $valor['id']; ?>"><?php echo $valor['nome_completo']; ?></a></td>
                <td><?php echo $valor['CPF']; ?></td>
                <td class="lastCol"><?php echo $valor['email']; ?></td>
            </tr>   
            <?php
            endforeach;
            ?>
        </table><!--lista-hospedes-->
    </div><!--tabela-hospedes-->
</div><!--container-->


<?php
require_once 'footer.php';

?>
