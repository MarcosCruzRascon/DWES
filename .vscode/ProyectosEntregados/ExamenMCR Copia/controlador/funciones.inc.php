<?php
include_once "gbd.php";

function crearExamen($array)
{
    foreach ($array as $key) {
        echo "<div id=" . $key->posicion . " class='pregunta' style='display: none;'>";
        echo "<div class='titulo'>";
        echo "<h4>" . $key->posicion . ". " . $key->tituloPregunta . "</h4>";
        echo "<br/>";
        echo '<span class="marcarRespuesta"><input type="checkbox" class="respuestaMarcada" onchange=cambiaColor() value="'.$key->posicion.'">Revisar</span>';
        echo "<br/>";
        echo "</div>";
        echo '<ul>';
        echo '<li><input type="radio" onclick=cambiaRespuesta() name="' . $key->posicion . '" value="' . $key->respuesta1[0] . '">' . $key->respuesta1 . '</li>';
        echo '<li><input type="radio" onclick=cambiaRespuesta() name="' . $key->posicion . '" value="' . $key->respuesta2[0] . '">' . $key->respuesta2 . '</li>';
        echo '<li><input type="radio" onclick=cambiaRespuesta() name="' . $key->posicion . '" value="' . $key->respuesta3[0] . '">' . $key->respuesta3 . '</li>';
        echo '<li><input type="radio" onclick=cambiaRespuesta() name="' . $key->posicion . '" value="' . $key->respuesta4[0] . '">' . $key->respuesta4 . '</li>';
        echo '</ul><br/>';
        echo '<button class="borrar" onclick=limpiar(event)>Resetear respuesta</button>';
        echo "</div>";
    }

}
