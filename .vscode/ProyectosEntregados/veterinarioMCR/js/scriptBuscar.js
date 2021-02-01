function doSearch() {
    var tableReg = document.getElementById('animales');
    var searchText = document.getElementById('busqueda').value.toLowerCase();
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}

function doSearchClientes() {
    var tableReg = document.getElementById('clientes');
    var searchText = document.getElementById('busqueda').value.toLowerCase();
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}

function doSearchFecha() {
    var tableReg = document.getElementById('agenda');
    var texto = document.getElementById('busquedaFecha').value.toLowerCase();
    var fecha = new Date(texto);
    searchText = fecha.toLocaleDateString();
    searchText = searchText.replace(/\//g, '-');
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}


window.addEventListener("load", function() {
    var tableReg = document.getElementById('agenda');
    if (tableReg != null) {
        var fecha = new Date();
        //fecha = fecha.getDate() + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear();
        //fecha = new Date(fecha);
        searchText = fecha.toLocaleDateString();
        searchText = searchText.replace(/\//g, '-');
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                tableReg.rows[i].style.display = 'none';
            }
        }
    }

    var botonImprimir = document.getElementById("convierte");
    if (botonImprimir != null) {
        botonImprimir.addEventListener("click", function() {
            var elemento = document.getElementById("imprimir");
            var textarea = document.getElementById("texto");
            textarea.innerHTML = elemento.innerHTML;
            var enviar = document.getElementById('enviar');
            enviar.click();
        })
    }


    var fecha = document.getElementById('busquedaFecha');
    if (fecha != null) {
        fecha = fecha.value.toLowerCase();
        if (fecha != null) {
            doSearchFecha();
        }
    }


})