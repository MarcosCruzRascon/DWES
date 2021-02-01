window.addEventListener("load", function() {
    var cliente = document.getElementById("cliente");
    if (cliente != null) {
        cliente.disabled = true;
    }


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