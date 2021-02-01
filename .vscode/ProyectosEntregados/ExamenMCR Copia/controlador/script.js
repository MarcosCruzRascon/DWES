window.addEventListener("load", function() {
    var preguntas = document.getElementsByClassName("pregunta");
    preguntas[0].style.display = "block";
    var tamanio = preguntas.length;
    var barra = document.getElementById("myBar");
    var porcentaje = "";
    porcentaje = (preguntas[0].getAttribute("id") * 100) / (tamanio);
    porcentaje = porcentaje + "%";
    barra.style.width = porcentaje;
    var finalizar = document.getElementById("finalizar");
    finalizar.addEventListener("click", function() {
        var pregunta = document.getElementsByClassName("pregunta");
        var tamanio = pregunta.length;
        var marcadas = 0;
        var respondidas = 0;
        var respuestasMarcadas = "";

        for (let i = 0; i < tamanio; i++) {
            var input = pregunta[i].getElementsByTagName("input");

            for (let j = 1; j < input.length; j++) {
                if (input[j].checked) {
                    respondidas++;
                }
            }

            var norespondidas = tamanio - respondidas;
        }
        localStorage.setItem("norespondidas", norespondidas);

        for (let i = 0; i < tamanio; i++) {
            var input = pregunta[i].getElementsByTagName("input");
            if (input[0].checked) {
                marcadas++;
                respuestasMarcadas += i;
            } else {
                respuestasMarcadas += " ";
            }

        }

        localStorage.setItem("marcadas", marcadas);
        localStorage.setItem("respuestasMarcadas", respuestasMarcadas);


    })


    timer();

    var itemIzquierda = document.getElementsByClassName("item");
    var divBotonesNavegar = document.getElementById("botonesNavegar");
    var boton = divBotonesNavegar.getElementsByClassName("siguiente")[0];
    var boton2 = divBotonesNavegar.getElementsByClassName("anterior")[0];
    for (let i = 0; i < itemIzquierda.length; i++) {
        itemIzquierda[i].addEventListener("click", function() {

            var id = itemIzquierda[i].id;
            var idMostrada;
            for (let j = 0; j < tamanio; j++) {
                if (preguntas[j].style.display == "block") {
                    idMostrada = j;
                }
            }
            if (parseInt(id) < idMostrada || parseInt(id) > idMostrada) {
                var diferencia = parseInt(id) - parseInt(idMostrada)
                if (diferencia < 0) {
                    for (let i = 0; i < Math.abs(diferencia); i++) {
                        boton2.click();
                    }
                } else {
                    for (let i = 0; i < diferencia; i++) {
                        boton.click();
                    }
                }

            }

        })
    }

})


function anterior(event) {
    var preguntas = document.getElementsByClassName("pregunta");
    var divBotonesNavegar = document.getElementById("botonesNavegar");
    var boton = divBotonesNavegar.getElementsByClassName("siguiente")[0];
    var boton2 = divBotonesNavegar.getElementsByClassName("anterior")[0];
    boton.style.visibility = "visible";
    var tamanio = preguntas.length;
    var barra = document.getElementById("myBar");


    for (let i = 0; i < tamanio; i++) {
        if (preguntas[i].style.display == "block") {
            var porcentaje = "";
            preguntas[i].previousElementSibling.style.display = "block";
            preguntas[i].style.display = "none";
            porcentaje = ((parseInt(preguntas[i].getAttribute("id")) - 1) * 100) / (tamanio);
            porcentaje = porcentaje + "%";
            barra.style.width = porcentaje;
            if (preguntas[0].style.display == "block") {
                boton2.style.visibility = "hidden";
            }
            event.preventDefault();
            break;
        }

    }
    event.preventDefault();
}

function siguiente(event) {


    var preguntas = document.getElementsByClassName("pregunta");
    var divBotonesNavegar = document.getElementById("botonesNavegar");
    var boton = divBotonesNavegar.getElementsByClassName("siguiente")[0];
    var boton2 = divBotonesNavegar.getElementsByClassName("anterior")[0];
    boton2.style.visibility = "visible";
    var tamanio = preguntas.length;
    var barra = document.getElementById("myBar");

    for (let i = 0; i < tamanio; i++) {

        if (preguntas[i].style.display == "block") {
            var porcentaje = "";
            preguntas[i].nextElementSibling.style.display = "block";
            preguntas[i].style.display = "none";
            porcentaje = ((parseInt(preguntas[i].getAttribute("id")) + 1) * 100) / (tamanio);
            porcentaje = porcentaje + "%";
            barra.style.width = porcentaje;
            if (preguntas[tamanio - 1].style.display == "block") {
                boton.style.visibility = "hidden"
            }
            event.preventDefault();
            break;
        }


    }
    event.preventDefault();
}

function limpiar(event) {

    var preguntas = document.getElementsByClassName("pregunta");
    var tamanio = preguntas.length;
    for (let i = 0; i < tamanio; i++) {
        if (preguntas[i].style.display == "block") {
            var respuestas = preguntas[i].getElementsByTagName("input");
            for (let i = 0; i < respuestas.length; i++) {
                if (respuestas[i].checked == true) {
                    respuestas[i].checked = false;
                }

            }
            event.preventDefault();
        }
        event.preventDefault();
        var itemIzquierda = document.getElementsByClassName("item");
        for (let i = 0; i < tamanio; i++) {
            var itemCambiar = itemIzquierda[i];
            itemCambiar.style.backgroundColor = "white";

        }
    }
}




function timer() {
    /*var days = Math.floor(seconds / 24 / 60 / 60);
    var hoursLeft = Math.floor((seconds) - (days * 86400));
    var hours = Math.floor(hoursLeft / 3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
    var minutes = Math.floor(minutesLeft / 60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }
    document.getElementById('temporizador').innerHTML = hours + ":" + minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('temporizador').innerHTML = "Completed";
    } else {
        seconds--;
    }*/
    var temporizador = document.getElementById("temporizador").innerHTML;
    var tiempo = temporizador.split(":");

    var ahora = new Date();
    var futuro = new Date();
    futuro.setUTCHours(ahora.getUTCHours() + (tiempo[0] - 0))
    futuro.setUTCMinutes(ahora.getUTCMinutes() + (tiempo[1] - 0))
    futuro.setUTCSeconds(ahora.getUTCSeconds() + (tiempo[2] - 0))

    function actualiza() {
        var a = futuro - new Date();
        var dif = new Date(a);
        var actual = numeroFormateado(dif.getUTCHours()) + ":" + numeroFormateado(dif.getUTCMinutes()) + ":" + numeroFormateado(dif.getUTCSeconds());

        if (actual != "0:0:0") {
            document.getElementById("temporizador").innerHTML = actual;
            setTimeout(actualiza, 1000);
        } else {

            alert("El tiempo ha terminado");
            document.getElementById("finalizar").click();
            var pregunta = document.getElementsByClassName("pregunta");
            var tamanio = pregunta.length;
            var respuestas = "";

            for (let i = 0; i < tamanio; i++) {
                var input = pregunta[i].getElementsByTagName("input");

                if (input[1].checked) {
                    respuestas += "A"
                } else if (input[2].checked) {
                    respuestas += "B"
                } else if (input[3].checked) {
                    respuestas += "C"
                } else if (input[4].checked) {
                    respuestas += "D"
                } else {
                    respuestas += " "
                }
            }
            localStorage.setItem("respuestas", respuestas);

        }
    }
    setTimeout(actualiza, 1000);

}


function cambiaColor() {
    debugger;
    var itemIzquierda = document.getElementsByClassName("item");
    var preguntas = document.getElementsByClassName("pregunta");
    var tamanioPreguntas = preguntas.length;
    for (let i = 0; i < tamanioPreguntas; i++) {
        var itemCambiar = itemIzquierda[i];
        if (preguntas[i].style.display == "block") {
            if (itemCambiar.style.backgroundColor == "white") {
                itemCambiar.style.backgroundColor = "orange"
            } else if (itemCambiar.style.backgroundColor == "green") {
                itemCambiar.style.backgroundColor = "orange"

            } else {
                itemCambiar.style.backgroundColor = "white"
            }
        }
        var inputs = preguntas[i].getElementsByTagName("input");
        for (let j = 1; j < inputs.length; j++) {
            if (inputs[j].checked && itemCambiar.style.backgroundColor != "orange") {
                itemCambiar.style.backgroundColor = "green"
            }
        }
    }



}

function cambiaRespuesta() {
    var itemIzquierda = document.getElementsByClassName("item");
    var preguntas = document.getElementsByClassName("pregunta");
    var tamanioPreguntas = preguntas.length;
    for (let i = 0; i < tamanioPreguntas; i++) {
        var itemCambiar = itemIzquierda[i];
        if (preguntas[i].style.display == "block") {
            if (itemCambiar.style.backgroundColor == "white") {
                itemCambiar.style.backgroundColor = "green"
            } else if (itemCambiar.style.backgroundColor == "green") {
                itemCambiar.style.backgroundColor = "green"
            } else {
                itemCambiar.style.backgroundColor = "white"
            }
        }

    }

}


function numeroFormateado(numero) {
    numero = numero + "";
    var salida = numero;
    if (numero.length == 1) {
        salida = "0" + numero;
    }
    return salida;
}