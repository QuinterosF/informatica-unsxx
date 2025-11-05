<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Extension.php");
/* inicializando clase */
$extension = new Extension();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "guardar_editar_ext":
        // Aquí puedes guardar solo el nombre en la base de datos
        if (empty($_POST["id_ext"])) {
            $extension->insert_extension(
                $_POST["nom_ext"],
                $_POST["fech_ext"],
                $_POST["desc_ext"]
            );
        } else {
            $extension->update_extension(
                $_POST["id_ext"],
                $_POST["nom_ext"],
                $_POST["fech_ext"],
                $_POST["desc_ext"]
            );
        }
        break;

    /* Listar toda la informacion segun el formato del datatable */
    case "listar_ext":
        $datos = $extension->get_for_table_ext();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nom_ext"];
            $sub_array[] = $row["fech_ext"];
            $sub_array[] = '<button type="button" title="Editar" onClick="editar_ext(' . $row["id_ext"] . ');" id="' . $row["id_ext"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar_ext(' . $row["id_ext"] . ');" id="' . $row["id_ext"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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

    case "listar_select_ext":
        $datos = $extension->get_for_table_ext();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nom_ext"];
            $sub_array[] = '<label class="rdiobox rdiobox-info"><input name="select_ext" type="radio" value="' . $row["id_ext"] . '" id="' . $row["id_ext"] . '"><span>&nbsp;</span></label>';
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

    case "listar_fotos_ext":
        $datos = $extension->get_for_table_fotos($_POST["id_ext"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = '<center><img src="../../images/extension/' . $row["nom_foto"] . '" alt="" max-height="300px" width="300px"></center>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar_foto(' . $row["id_foto"] . ');" id="' . $row["id_foto"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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
        $datos = $extension->cant_paginas();
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;

    case "get_nom_ext":
        $datos = $extension->get_nombre_ext($_POST["id_ext"]);
        foreach ($datos as $row) {
            $output["nom_ext"] = $row["nom_ext"];
        }
        echo json_encode($output);
        break;

    case "paginacion_datos_ext":
        $datos = $extension->paginacion_datos_ext($_POST["offset"]);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_ext" => $row["id_ext"],
                "nom_ext" => $row["nom_ext"],
                "desc_ext" => $row["desc_ext"],
                "fech_ext" => $row["fech_ext"]
            ];
        }

        echo json_encode($output);
        break;

    case "paginacion_fotos_ext":
        $datos = $extension->paginacion_fotos_ext($_POST["id_ext"]);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "nom_foto" => $row["nom_foto"]
            ];
        }

        echo json_encode($output);
        break;

    // Llenar en el formulario con los datos del extension
    case "mostrar_datos":
        $datos = $extension->get_extension_x_id($_POST["id_ext"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_ext"] = $row["id_ext"];
                $output["nom_ext"] = $row["nom_ext"];
                $output["fech_ext"] = $row["fech_ext"];
                $output["desc_ext"] = $row["desc_ext"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar_ext":
        // Elimina el archivo de la carpeta images con su nombre original
        // unlink('../images/perfil_extension/' . $_POST["foto_acad"]);

        $extension->delete_extension($_POST["id_ext"]);
        break;

    case "guardar_foto":
        if (isset($_FILES['fotos']) && !empty($_FILES['fotos']['name'][0])) {
            // Itera sobre cada foto
            for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
                $nombre_foto = $_FILES['fotos']['name'][$i];

                // Mueve el archivo a la carpeta images con su nombre original
                $ruta_destino = '../images/extension/' . $nombre_foto;
                if (move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $ruta_destino)) {
                    // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
                    $extension->insert_foto($nombre_foto, $_POST["id_ext_fotos"]);
                } else {
                    echo "Error al mover el archivo.";
                }
            }
        }
        break;

    case "eliminar_foto":
        // Elimina el archivo de la carpeta images con su nombre original
        // unlink('../images/perfil_extension/' . $_POST["foto_acad"]);

        $extension->delete_foto($_POST["id_foto"]);
        break;
}
?>