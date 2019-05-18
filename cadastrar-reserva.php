<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
require_once 'server/apartamentos.class.php';
require_once 'server/hospede.class.php';
$hospede = new Hospede();
$listaHospede = $hospede->listarHospedes();
$apartamento = new Apartamentos();
$listaApartamento = $apartamento->getApartamentos();
?>
<div class="container">
    <h1>Adicionar reserva</h1>
    
    <form method="post">
        Hospede:
         <select>
             <option value="">selecione o hospede</option>
        <?php
            foreach($listaHospede as $hospede):
            ?>
                <option value="<?php echo $hospede['id']; ?>"><?php echo $hospede['nome_completo']; ?></option>
            <?php
            endforeach;
        ?>
        </select><br><br>
        
        Data de entrada:<br>
        <input type="date" name="data-entrada"><br><br>
        Data de saída:<br>
        <input type="date" name="data-saida"><br><br>
        Horarios:<br>
        <select>
            <option>check-in 14:00 | check-out 12:00</option>
        </select><br><br>
        
        Apartamento:
        <select>
            <option value="">selecione o apartamento</option>
        <?php
            foreach($listaApartamento as $apto):
            ?>
                <option value="<?php echo $apto['id']; ?>"><?php echo $apto['numero'].' | '.$apto['camas']; ?></option>
            <?php
            endforeach;
        ?>
        </select><br><br>




    </form>






</div>


<?php
require_once 'footer.php';


?>
