<html>

<head>
    <script>
        function comprobar() {
            var numero = document.getElementById("numero").value;
            var importe = document.getElementById("importe").value;
            var table = document.getElementById("numeros").tBodies[0];
            if (numero == "" || importe == "" || numero>99999  || numero<00000 || importe>20 || importe<1){
                document.getElementById("premio").value = "";
                document.getElementById("error").innerHTML = "Error en los datos proporcionados";
                return;
            } else {
                document.getElementById("error").innerHTML = "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //document.getElementById("premio").innerHTML = this.responseText;
                        var fila = table.insertRow(0);
                        var celda = fila.insertCell(0)
                        var inputNumero = document.createElement("span");
                        inputNumero.innerHTML = numero;
                        celda.appendChild(inputNumero);

                        var celda = fila.insertCell(1)
                        var inputPremio = document.createElement("span");
                        inputPremio.innerHTML = this.responseText;
                        celda.appendChild(inputPremio);
                    }
                };

                xmlhttp.open("GET", "numeros.php?numero=" + numero + "&importe=" + importe, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    Numero: <input id="numero" type="number">
    Importe jugado: <input id="importe" type="number" step="any">
    <button type="submit" onclick="comprobar()">Comprobar</button>
    <br />
    <span id="error"></span>
    <br/>
    <!--<p><span id="premio"></span></p>-->
    <table id="numeros">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Premio</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
</html>