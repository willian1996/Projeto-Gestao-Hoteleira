<?php
require_once 'server/conexao.php';
require_once 'server/hospede.class.php';
$hospede = new Hospede($pdo);

require_once 'header.php';
?>

<div class="container">
    <a href="cadastrar-hospede.php">Novo Hospede</a>
    <div class="lista-hospedes">
        <h2>Hospedes cadastrados</h2>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th class="lastCol">E-Mail</th>
                
            </tr>
            <?php
            $lista = $hospede->listarHospedes();
            foreach($lista as $valor):
            ?>
            <tr>
                <td><?php echo $valor['id']; ?></td>
                <td><a href="detalhes-hospede.php?id=<?php echo $valor['id']; ?>"><strong><?php echo $valor['nome_completo']; ?></strong></a></td>
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
