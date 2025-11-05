<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<!-- MIS SCRIPTS.JS -->
<script>
    var baseUrl = "";  // Establece aquí la ruta base según la ubicación de tus controladores

    
    // LLENA LOS NÚMEROS DE CELULAR EN EL FOOTER #####################################################
    $.post(
        "controller/celulares.php?op=cargar_datos",
        function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                // Obtén el contenedor donde se agregarán los perfiles académicos
                var container = $("#cel_footer");

                // Recorre los datos y agrega cada numero de celular al contenedor
                data.forEach(function (cel) {
                    // Crea un nuevo numero de celular con los datos obtenidos
                    var perfilAcademico = `
                        <p><i class="fa fa-phone"></i> ${cel.nom_cel} (+591 ${cel.num_cel})</p>
                    `;

                    // Agrega el numero de celular al contenedor
                    container.append(perfilAcademico);
                });
            }
        }
    );
</script>