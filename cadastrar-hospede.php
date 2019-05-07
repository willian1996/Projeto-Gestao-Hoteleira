<?php
require_once 'header.php';
?>


<div class="container">
    <a href="lista-hospedes.php">Voltar para lista</a>
    <div class="form_cadastrar_hospede">
        <h2>Cadastrar Hospede</h2>
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
        <input onfocusout="validarCelular()" type="tel" id="fcelular" name="celular" required/><span id="spancelular"></span>
        <br><br>
        Telefone:<br>
        <input onfocusout="validarTelefone()" type="tel" id="ftelefone" name="telefone" required/><span id="spantelefone"></span>
        <br><br>
        <button id="botaoCadastrar" onclick="criarHospede()">Cadastrar</button>
    </div>
</div>

    
    








<?php
require_once 'footer.php';
?>