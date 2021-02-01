/*function convierte(tiempo) {
    var time = tiempo;
    var timeParts = time.split(":");
    return (+timeParts[0] * (60000 * 60)) + (+timeParts[1] * 60000);

}

var arrayCitas;
var arrayFinCitas;
var fechaInicioString;
var fechaInicio;
var fechaFinString;
var fechaFin;

window.addEventListener("load", function() {

    var selectInicio = document.getElementById("horaInicio");
    var selectFin = document.getElementById("horaFin");
    var botonEnviar = document.getElementById('enviar');

    //botonEnviar.addEventListener('click', enviar);



    /*diaElegido citas finCitas*/
/*  selectInicio.selectedIndex = 0;
    if (diaElegido != null) {
        fechaInicioString = diaElegido + " " + selectInicio.value + ":00";
        fechaInicio = new Date(fechaInicioString);
    }
    selectFin.selectedIndex = 0;
    if (diaElegido != null) {
        fechaFinString = diaElegido + " " + selectFin.value + ":00";
        fechaFin = new Date(fechaFinString);
    }

    selectInicio.addEventListener("change", function() {
        if (diaElegido != null) {
            fechaInicioString = diaElegido + " " + selectInicio.value + ":00";
            fechaInicio = new Date(fechaInicioString);
        }
    });


    selectFin.addEventListener("change", function() {
        if (diaElegido != null) {
            fechaFinString = diaElegido + " " + selectFin.value + ":00";
            fechaFin = new Date(fechaFinString);
        }
    })
    try {
        arrayCitas = citas;
        arrayFinCitas = finCitas;
    } catch (error) {

    }

    if (arrayCitas != null) {
        for (let i = 0; i < arrayCitas.length; i++) {
            arrayCitas[i] = new Date(arrayCitas[i])
        }
    }

    if (arrayFinCitas != null) {
        for (let i = 0; i < arrayFinCitas.length; i++) {
            var fechaString = diaElegido + " " + arrayFinCitas[i] + ":00";
            arrayFinCitas[i] = new Date(fechaString)
        }
    }
})*/

/*function enviar(ev) {
    var label = document.getElementById('error');
    for (let i = 0; i < arrayCitas.length; i++) {
        var inicioEntreDos = fechaInicio > arrayCitas[i] && fechaInicio < arrayFinCitas[i];
        var finEntreDos = fechaFin > arrayCitas[i] && fechaFin < arrayFinCitas[i];
        var ampliado = fechaInicio < arrayCitas[i] && fechaFin > arrayFinCitas[i];
        var enviar = true;

        if (inicioEntreDos || finEntreDos || ampliado) {

            enviar = false;
            ev.preventDefault;
            label.style.display = "block";
            stop

        } else {
            if (label.style.display == "block") {
                label.style.display = "block";
            }

        }

    }*/


/*function validateMyForm(event) {
    var form = document.getElementById('form');
    for (let i = 0; i < arrayCitas.length; i++) {
        var inicioEntreDos = fechaInicio > arrayCitas[i] && fechaInicio < arrayFinCitas[i];
        var finEntreDos = fechaFin > arrayCitas[i] && fechaFin < arrayFinCitas[i];
        var ampliado = fechaInicio < arrayCitas[i] && fechaFin > arrayFinCitas[i];
        var enviar = true;

        if (inicioEntreDos || finEntreDos || ampliado) {
            {
                alert("El tramo horario introducido interfiere en otras citas");
                form.preventDefault();
                enviar = false;
            }

            return enviar;
        }
    }
}*/