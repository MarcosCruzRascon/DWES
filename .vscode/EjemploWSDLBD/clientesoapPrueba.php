<?php
require_once './vendor/autoload.php';
$cliente = new Zend\Soap\Client('http://localhost/PHP/.vscode/EjemploWSDLBD/servidorsoapProducto.php?wsdl');
$result = $cliente->datos(['nombre' => 'reloj']);
echo $result->datosResult . "\n";
//echo "Response:\n" . $cliente->getLastResponse() . "\n";
