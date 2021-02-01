<?php
require_once './vendor/autoload.php';

use Dompdf\Dompdf;
ob_clean();
$texto = $_POST["impresion"];
$texto = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $texto);
$html = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pedazo de PDF</title>
</head>';
$html=preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $html);
$html.='<style>table.blueTable {
    border: 1px solid #1C6EA4;
    background-color: #EEEEEE;
    width: 100%;
    text-align: center;
    border-collapse: collapse;
}

table.blueTable td,
table.blueTable th {
    border: 1px solid #AAAAAA;
    padding: 4px 7px;
}

table.blueTable tbody td {
    font-size: 13px;
}

table.blueTable tr:nth-child(even) {
    background: #D0E4F5;
}

table.blueTable thead {
    background: #1C6EA4;
    background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
    border-bottom: 2px solid #444444;
}

table.blueTable thead th {
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-align: left;
    border-left: 2px solid #D0E4F5;
}

table.blueTable thead th:first-child {
    border-left: none;
}

table.blueTable tfoot td {
    font-size: 14px;
}

table.blueTable tfoot .links {
    text-align: right;
}

table.blueTable tfoot .links a {
    display: inline-block;
    background: #1C6EA4;
    color: #FFFFFF;
    padding: 2px 8px;
    border-radius: 5px;
}</style>';
$html=preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $html);

$html.='<body>';

$html.=$texto;
$html=preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $html);
$html.='</body>
</html>';
$html=preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $html);
$mipdf = new Dompdf();
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf->setPaper("A4", "landscape");
# Cargamos el contenido HTML.
$mipdf->loadHtml($html, "UTF-8");
# Renderizamos el documento PDF.
$mipdf->render();

# Enviamos el fichero PDF al navegador.
$mipdf->stream('HeavenTicket.pdf', array('Attachment' => 0));
//$mipdf->stream('HeavenTicket.pdf');

