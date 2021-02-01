<html>

<head>
    <script>
        function suma() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            if (num1.length == 0 || num2.length== 0) {
                document.getElementById("suma").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("suma").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "sumatorio.php?num1=" + num1 +"&num2="+num2, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <p><b>Inserte los numeros para sumar:</b></p>
    <form>Numero uno: <input id="num1" type="number" onkeyup="suma()">
    <form>Numero uno: <input id="num2" type="number" onkeyup="suma()">
    </form>
    <p>Suggestions: <span id="suma"></span></p>
</body>

</html>