<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
require_once 'server/apartamentos.class.php';
require_once 'server/reservas.class.php';
$apartamentos = new Apartamentos();
$listaApartamentos = $apartamentos->getApartamentos();
$reservas = new Reservas();
$listaReservas = $reservas->getReservas();


///estrutura calendario
$data = date("Y-m-d");
$data = new DateTime($data);     // Pega a data de hoje
$diaN = date( "w", strtotime($data->format('Y-m-d'))); // Dia da semana, começa em 0 com domingo, 1 para segunda...

$data->modify('-' . $diaN . ' day');

$diasSemana = [];
for($i=0;$i<=7;$i++) {
    array_push($diasSemana, $data->format('d/m/y'));
    $data->modify('+1 day');
}

?>

<div class="container">
    <a href="cadastrar-reserva.php">Nova Reserva</a>
    <div class="reservas-calendario">
        <table class="calendario">
            <tr>
                <th>APTO</th>
                <th><p>SEG</p><p class="dias-semana"><?php echo $diasSemana[1]?></p></th>
                <th><p>TER</p><p class="dias-semana"><?php echo $diasSemana[2]?></p></th>
                <th><p>QUA</p><p class="dias-semana"><?php echo $diasSemana[3]?></p></th>
                <th><p>QUI</p><p class="dias-semana"><?php echo $diasSemana[4]?></p></th>
                <th><p>SEX</p><p class="dias-semana"><?php echo $diasSemana[5]?></p></th>
                <th><p>SAB</p><p class="dias-semana"><?php echo $diasSemana[6]?></p></th>
                <th><p>DOM</p><p class="dias-semana"><?php echo $diasSemana[7]?></p></th>
            </tr>
            <?php 
            foreach($listaApartamentos as $value):
            ?>
                <tr>
                    <td class="num-apto"><?php echo $value['numero']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="item-reserva">Willian Sales</div></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php
            endforeach;
    
            
            ?>
            
            
    

        </table>
    </div>
    
    
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