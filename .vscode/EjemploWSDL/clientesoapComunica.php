<?php
require_once './vendor/autoload.php';
$cliente = new Zend\Soap\Client('http://localhost/PHP/.vscode/EjemploWSDL/servidorsoapComunica.php?wsdl');
$result = $cliente->saluda(['nombre' => 'marcos']);
echo $result->saludaResult . "\n";
//echo "Response:\n" . $cliente->getLastResponse() . "\n";

echo "<br/>";

$result = $cliente->despide(['nombre' => 'marcos']);
echo $result->despideResult . "\n";

