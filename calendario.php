<?php

$data = date("Y-m-d");
$data = new DateTime($data);     // Pega a data de hoje
$diaN = date( "w", strtotime($data->format('Y-m-d'))); // Dia da semana, começa em 0 com domingo, 1 para segunda...

$data->modify('-' . $diaN . ' day');

$diasSemana = [];
for($i=0;$i<=7;$i++) {
    array_push($diasSemana, $data->format('d/m/y'));
    $data->modify('+1 day');
}


?>