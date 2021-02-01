<?php
require_once __DIR__ . '/vendor/autoload.php';
require "Comunica.php";
$serverUrl = "http://localhost/PHP/.vscode/EjemploWSDL/servidorsoapComunica.php";
if (isset($_GET['wsdl'])) {
    $soapAutoDiscover = new \Zend\Soap\AutoDiscover(new \Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence());
    $soapAutoDiscover->setBindingStyle(array('style' => 'document'));
    $soapAutoDiscover->setOperationBodyStyle(array('use' => 'literal'));
    $soapAutoDiscover->setClass('Comunica');
    $soapAutoDiscover->setUri($serverUrl);
    header("Content-Type: text/xml");
    echo $soapAutoDiscover->generate()->toXML();
}
else
{
    $soap = new \Zend\Soap\Server($serverUrl. '?wsdl');
    $soap->setObject(new \Zend\Soap\Server\DocumentLiteralWrapper(new Comunica()));
    $soap->handle();
}
