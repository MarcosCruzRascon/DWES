<?php
$arrayLoteria = [
    "54341" => 400000,
    "82986" => 125000,
    "45122" => 50000,
    "82342" => 20000,
    "12341" => 20000,
    "43512" => 6000,
    "54431" => 6000,
    "76547" => 6000,
    "19238" => 6000,
    "14690" => 6000,
    "32784" => 6000,
    "90872" => 6000,
    "18246" => 6000,
];



$numero = $_REQUEST['numero'];
$importe = $_REQUEST['importe'];
$premio = "";

foreach ($arrayLoteria as $numeroArray => $value) {
    if($numeroArray == $numero)
    {
        $premio = ($importe*$value)/20;
    }
}


echo $premio===""?"Sin premio":$premio;

?>