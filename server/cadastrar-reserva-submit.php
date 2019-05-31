<?php
session_start();
if(empty($_POST['hospede'])){
   header("Location: ../index.php");
}

//puxando o arquivo classe reservas
require_once 'reservas.class.php';

//estanciando o obj reservas
$reserva = new Reservas();

//pegando os valores indo do ajax por post
$dados["hospede"] = $_POST['hospede'];
$dados["checkin"] = $_POST['checkin'];
$dados["checkout"] = $_POST['checkout'];
$dados["apto"] = $_POST['apto'];
$dados['id_funcionario'] = $_SESSION['idFunc'];


//chamando o metodo para cadastrar reserva 
$retorno = $reserva->addReserva($dados);

//devolvendo resposta para o ajax 
echo json_encode($retorno);