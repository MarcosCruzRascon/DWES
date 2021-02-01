window.addEventListener("load", function() {



    var vacuna = document.getElementById("vacuna");
    vacuna.addEventListener("change", function() {
        if (vacuna.checked == true) {
            document.getElementById("vacunacion").style.display = "block";
            var motivo = document.getElementById("motivo");
            var tratamiento = document.getElementById("tratamiento");

            motivo.innerText = "Vacunacion";
            tratamiento.innerText = "Vacunacion";
        } else {
            document.getElementById("vacunacion").style.display = "none";
            var motivo = document.getElementById("motivo");
            var tratamiento = document.getElementById("tratamiento");

            motivo.innerText = "";
            tratamiento.innerText = "";
        }
    })

    document.getElementById("cliente").disabled = true;

    if (document.getElementById("btnModal")) {
        var modal = document.getElementById("tvesModal");
        var btn = document.getElementById("btnModal");
        var span = document.getElementsByClassName("close")[0];
        var body = document.getElementsByTagName("body")[0];

        btn.onclick = function(ev) {
            modal.style.display = "block";

            body.style.position = "static";
            body.style.height = "100%";
            body.style.overflow = "hidden";
            ev.preventDefault();
        }

        span.onclick = function(ev) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
            ev.preventDefault();
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";

                body.style.position = "inherit";
                body.style.height = "auto";
                body.style.overflow = "visible";
            }
        }
    }
})