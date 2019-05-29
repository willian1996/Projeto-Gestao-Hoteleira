<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
require_once 'server/reservas.class.php';
$reservas = new Reservas();
?>

<div class="container">
    <a href="cadastrar-reserva.php">Nova Reserva</a>
    <div class="lista-reservas">
        <table>
            <tr>
                <th>Nº</th>
                <th>Hóspede</th>
                <th>Apto</th>
                <th>Data</th>
                <th class="lastCol">Check-in</th>
                <th class="lastCol">Check-out</th>            
            </tr>
            <?php
            $listaReservas = $reservas->getReservas();
            foreach($listaReservas as $valor):
            ?>
            <tr>
                <td><?php echo $valor['id'];  ?></td>
                <td><a href="detalhes-reserva.php?idReserv=<?php echo $valor['id']; ?>"><?php echo $valor['nome_completo']; ?></a></td>
                <td><?php echo $valor['numero']; ?></td>
                <td><?php echo date("d/m/y", strtotime($valor['dataCadastro'])); ?></td>
                <td class="lastCol"><?php echo date("d/m/y H:m", strtotime($valor['data_entrada'])); ?></td>
                <td class="lastCol"><?php echo date("d/m/y H:m", strtotime($valor['data_saida'])); ?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>

    























</div>

<?php
require_once 'footer.php';


?>