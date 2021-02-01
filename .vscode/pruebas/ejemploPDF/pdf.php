<?php
require_once './vendor/autoload.php';
use Dompdf\Dompdf;
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pedazo de PDF</title>
</head>
<body>

<h2>Ingredientes para aprobar DWES</h2>
<p>Ingredientes:</p>
<dl>
<dd>Perseverancia</dd>
<dd>Constancia</dd>
<dd>Optimismo</dd>
<dd>Autoestima</dd>
<dd>Trabajo en Equipo</dd>
<dd>Jamón Pata Negra</dd>
</dl>
</body>
</html>';
$mipdf = new Dompdf();
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->setPaper("A4", "portraid");
# Cargamos el contenido HTML.
$mipdf ->loadHtml($html);
# Renderizamos el documento PDF.
$mipdf ->render();

# Enviamos el fichero PDF al navegador.
$mipdf ->stream('HeavenTicket.pdf', array( 'Attachment'=>0 ) );

?>