<?php
require_once 'header.php';
?>


<div class="container">
    <h2>Cadatrar Hospede</h2>

    <div class="form_cadastrar_hospede">
        Nome Completo:<br>
        <input onfocusout="validarNome()" type="text" id="fnome_completo" name="nome_completo" required/><span id="spannome"></span>
        <br><br>
        CPF:<br>
        <input onfocusout="validarCPF()" type="text" id="fCPF" name="CPF" required/><span id="spancpf"></span>
        <br><br>
        Email:<br>
        <input onfocusout="validarEmail()" type="email" id="femail" name="email" required/><span id="spanemail"></span>
        <br><br>
        Celular:<br>
        <input type="tel" id="fcelular" name="celular" required/><span id="spancelular"></span>
        <br><br>
        Telefone:<br>
        <input type="tel" id="ftelefone" name="telefone" required/><span id="spantelefone"></span>
        <br><br>
        <button id="botaoCadastrar" onclick="criarHospede()">Cadastrar</button>
    </div>
</div>

    
    








<?php
require_once 'footer.php';
?>