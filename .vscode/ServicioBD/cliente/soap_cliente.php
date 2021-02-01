<?php
$client = new SoapClient('http://localhost/PHP/.vscode/ServicioBD/servidor/producto.wsdl',array(
      'location' => "http://localhost/PHP/.vscode/ServicioBD/servidor/soap_server.php",
      'uri'      => "http://localhost/PHP/.vscode/ServicioBD/servidor/",
      'trace'    => 1
       ));
try {
	echo $return = $client->__soapCall("datos", ["nombre"=> "reloj"] );
} catch ( SOAPFault $e ) {
	echo $e->getMessage().PHP_EOL;
}