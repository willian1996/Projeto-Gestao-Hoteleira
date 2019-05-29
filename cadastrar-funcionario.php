<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
?>


<div class="container">
    <button><a href="javascript:history.back()">Voltar</a></button>
    <div>
        <h2>Cadastrar Funcionário</h2>
        Nome Completo:<br>
        <input type="text" id="nomeFunc" name="nomeFunc" /><span id="spannome"></span>
        <br><br>
        E-mail:<br>
        <input type="email" id="emailFunc" name="emailFunc" /><span id="spanemail"></span>
        <br><br>
        Senha:<br>
        <input type="password" id="senhaFunc" name="senhaFunc" /><span id="spansenha"></span>
        <br><br>
        <button id="botaoCadastrarFunc" onclick="cadastrarFuncionario()">Cadastrar</button>
    </div>
</div>


    
    








<?php
require_once 'footer.php';
?>