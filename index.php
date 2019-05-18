<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
require_once 'calendario.php';
require_once 'server/apartamentos.class.php';
$apartamentos = new Apartamentos();
$listaApartamentos = $apartamentos->getApartamentos();
?>

<div class="container">
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
    









</div>

<?php
require_once 'footer.php';

?>