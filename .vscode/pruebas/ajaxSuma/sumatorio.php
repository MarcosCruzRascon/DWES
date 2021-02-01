<?php
$num1 = $_REQUEST["num1"];
$num2 = $_REQUEST["num2"];
$suma = "";

if ($num1 !== "" && $num2!=="")
{
    $suma = $num1+$num2;
} 

echo $suma===""?"Inserte los numeros":$suma;