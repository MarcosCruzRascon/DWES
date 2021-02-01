<?php
$fichero = new DOMDocument();
$fichero->load("https://es.cointelegraph.com/rss");
//$fichero->load("https://www.coindesk.com/feed?x=1");
$salida = array();
$noticias = $fichero->getElementsByTagName("item");
foreach ($noticias as $noticia) {
    $nuevo = array();
    $nuevo['titular'] = $noticia->getElementsByTagName("title")[0]->nodeValue;
    $nuevo["url"]=$noticia->getElementsByTagName("link")[0]->nodeValue;
    $salida[]=$nuevo;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultimas noticias</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        setInterval(function () {
            $("#tabla").load(location.href+" #tabla>*","");
        }, 1000)
    </script>
<body>
    <table id="tabla">
    <?php
            foreach ($salida as $noticia) {
                $url=$noticia["url"];
                $titular = $noticia["titular"];
                echo "<tr><a href='$url'>$titular</a></tr><br/>";
            }
        ?>
    </table>
       
</body>
</html>