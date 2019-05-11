<?php
require_once 'header.php';

?>


<div class="container">
    <a href="lista-hospedes.php">Voltar para lista</a>
    <div class="loguin-funcionario">
        Email:<br>
        <input type="email" name="email" id="emailLogin"/><br><br>

        Senha:<br>
        <input type="senha" name="senha" id="senhaLogin"/><br><br>
        
        
        <button id="botaoLogin" onclick="logarFuncionario()">Cadastrar</button>
    </div>
</div>

    
    








<?php
require_once 'footer.php';
?>