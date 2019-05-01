<?php
require_once 'header.php';
?>


<div class="container">
    <h2>Cadatrar Hospede</h2>

    <div class="form_cadastrar_hospede">
        <form method="post" action="server/cadastrar-hospede-submit.php">
            Nome Completo:<br>
            <input type="text" id="nome_completo" name="nome_completo" required/><br><br>
            CPF:<br>
            <input type="text" id="CPF" name="CPF" required/><br><br>
            Email:<br>
            <input type="email" id="email" name="email" required/><br><br>
            Celular:<br>
            <input type="tel" id="celular" name="celular" required/><br><br>
            Telefone:<br>
            <input type="tel" id="telefone" name="telefone" required/><br><br>
            <input type="submit" value="Enviar"/>
        </form>
    </div>
</div>

    
    








<?php
require_once 'footer.php';
?>