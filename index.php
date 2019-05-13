<?php
session_start();
if(!isset($_SESSION['idFunc'])){
    header('Location: login-funcionario.php');
}
require_once 'header.php';
?>

<div class="container">
    <a href="lista-hospedes.php">Lista Hospede</a><br>
    <a href="cadastrar-hospede.php">Cadastrar Hospede</a><br>
    <a href="cadastrar-funcionario.php">Cadastrar Funcionário</a><br>
    <a href="server/logout.php">Sair</a>
    
    

























</div>

<?php
require_once 'footer.php';

?>