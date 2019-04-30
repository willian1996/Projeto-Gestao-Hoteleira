<?php

$dbname = 'gestao-hoteleira';
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';

try{
    $pdo = new PDO("mysql:dbname=$dbname;host=$host",$dbuser, $dbpass);
}catch(PDOException $e){
    echo "Erro ao conectar ".$e->getMessage();
}

