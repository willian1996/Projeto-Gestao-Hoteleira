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
    <div class="cadastrar-reserva">
    <h1>Adicionar reserva</h1>
        Hospede:
         <select id="titular-reserva">
             <option value="">selecione o hospede titular</option>
        <?php
            foreach($listaHospede as $hospede):
            ?>
                <option value="<?php echo $hospede['id']; ?>"><?php echo $hospede['nome_completo']; ?></option>
            <?php
            endforeach;
        ?>
        </select><br><br>
        
        Data de entrada:<br>
        <input type="date" name="data-entrada" id="data-entrada"><br><br>
        Data de saída:<br>
        <input type="date" name="data-saida" id="data-saida"><br><br>
        Horarios:<br>
        <select id="horario-entrada">
            <option value=""></option>
            <option value="hora1">check-in 14:00 | check-out 12:00</option>
            <option value="hora2">check-in 18:00 | check-out 16:00</option>
        </select><br><br>
        
        Apartamento:
        <select id="apartamento">
            <option value="">selecione o apartamento</option>
        <?php
            foreach($listaApartamento as $apto):
            ?>
                <option value="<?php echo $apto['id']; ?>"><?php echo $apto['numero'].' | '.$apto['camas']; ?></option>
            <?php
            endforeach;
        ?>
        </select><br><br>
        <button onclick="cadastrarReserva()">Reservar</button>
    </div>






</div>


<?php
require_once 'footer.php';


?>
