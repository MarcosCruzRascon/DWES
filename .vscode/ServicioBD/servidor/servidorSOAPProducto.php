<?php
require_once __DIR__ . '/vendor/autoload.php';
require "./producto.php";
$serverUrl = "http://localhost/PHP/.vscode/ServicioBD/servidor/servidorSOAPProducto.php";
if (isset($_GET['wsdl'])) {
    $soapAutoDiscover = new \Zend\Soap\AutoDiscover(new \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence());
    $soapAutoDiscover->setBindingStyle(array('style' => 'document'));
    $soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
    $soapAutoDiscover->setClass('Producto');
    $soapAutoDiscover->setUri($serverUrl);
    header("Content-Type: text/xml");
    echo $soapAutoDiscover->generate()->toXML();
}
else
{
    $soap = new \Zend\Soap\Server($serverUrl. '?wsdl');
    $soap->setObject(new \Zend\Soap\Server\DocumentLiteralWrapper(new Producto()));
    $soap->handle();
}
