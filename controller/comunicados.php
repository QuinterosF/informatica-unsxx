<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Comunicados.php");
/* inicializando clase */
$comunicados = new Comunicados();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "guardar_editar":
        $nombre_foto = "";
        $nombre_pdf = "";

        // Función para mover archivos
        function moverArchivo($archivo, $destino)
        {
            if (isset($archivo) && $archivo['error'] === UPLOAD_ERR_OK) {
                $nombre_archivo = $archivo['name'];

                // Mueve el archivo al destino especificado
                move_uploaded_file($archivo['tmp_name'], $destino . $nombre_archivo);

                // Retorna el nombre del archivo para almacenarlo en la base de datos
                return $nombre_archivo;
            }

            return ""; // No se subió ningún archivo
        }

        // Obtener nombre del archivo PDF
        $nombre_pdf = moverArchivo($_FILES['doc_com'], '../docs/comunicados/pdf/');

        // Obtener nombre del archivo de foto_com
        $nombre_foto = moverArchivo($_FILES['foto_com'], '../docs/comunicados/img/');

        // Obtener la fecha actual
        $fecha = date("Y-m-d"); // Formato: Año-Mes-Día

        // Aquí puedes guardar solo el nombre en la base de datos
        if (empty($_POST["id_com"])) {
            $comunicados->insert_comunicados(
                $_POST["nom_com"],
                $_POST["desc_com"],
                $nombre_pdf,
                $nombre_foto,
                $fecha
            );
        } else {
            $comunicados->update_comunicados(
                $_POST["id_com"],
                $_POST["nom_com"],
                $_POST["desc_com"],
                $nombre_pdf,
                $nombre_foto
            );
        }
        break;

    /* Listar toda la informacion segun el formato del datatable */
    case "listar":
        $datos = $comunicados->get_for_table();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["fech_com"];
            $sub_array[] = $row["nom_com"];
            $sub_array[] = '
                <center>
                    <a href="../../docs/comunicados/pdf/' . $row["doc_com"] . '" target="_blank" class="btn btn-danger btn-with-icon mg-b-15">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="icon ion-document-text"></i></span>
                        </div>
                    </a>
                </center>
            ';

            $container = $row["foto_com"] == "" ? '' : '
                <center>
                    <a href="../../docs/comunicados/img/' . $row["foto_com"] . '" target="_blank" class="btn btn-info btn-with-icon mg-b-15">
                        <div class="ht-40">
                            <span class="icon wd-40"><i class="icon ion-image"></i></span>
                        </div>
                    </a>
                </center>
            ';
            $sub_array[] = $container;

            $sub_array[] = '<button type="button" title="Editar" onClick="editar(' . $row["id_com"] . ');" id="' . $row["id_com"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar(' . $row["id_com"] . ');" id="' . $row["id_com"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[] = $sub_array;
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case "cant_paginas":
        $datos = $comunicados->cant_paginas();
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;

    case "paginacion":
        $datos = $comunicados->paginacion($_POST["offset"]);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_com" => $row["id_com"],
                "nom_com" => $row["nom_com"],
                "desc_com" => $row["desc_com"],
                "doc_com" => $row["doc_com"],
                "foto_com" => $row["foto_com"],
                "fech_com" => $row["fech_com"]
            ];
        }

        echo json_encode($output);
        break;

    // Llenar en el formulario con los datos del comunicados
    case "mostrar_datos":
        $datos = $comunicados->get_comunicados_x_id($_POST["id_com"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_com"] = $row["id_com"];
                $output["nom_com"] = $row["nom_com"];
                $output["desc_com"] = $row["desc_com"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar":
        // Elimina el archivo de la carpeta images con su nombre original
        // unlink('../images/perfil_comunicados/' . $_POST["foto_acad"]);

        $comunicados->delete_comunicado($_POST["id_com"]);
        break;
}
?>