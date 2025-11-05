<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/logros.php");
/* inicializando clase */
$logros = new logros();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {

    /* Listar toda la informacion segun el formato del datatable */
    case "listar":
        $datos = $logros->get_for_table();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nom_log"];
            $sub_array[] = $row["lugar_log"];
            $sub_array[] = $row["fech_log"];
            $sub_array[] = '<button type="button" title="Editar" onClick="editar_logro(' . $row["id_log"] . ');" id="' . $row["id_log"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar_logro(' . $row["id_log"] . ');" id="' . $row["id_log"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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

    case "guardar_editar":
        if (empty($_POST["id_log"])) {
            $logros->insert_logros(
                $_POST["nom_log"],
                $_POST["lugar_log"],
                $_POST["fech_log"]
            );
        } else {
            $logros->update_logros(
                $_POST["id_log"],
                $_POST["nom_log"],
                $_POST["lugar_log"],
                $_POST["fech_log"]
            );
        }
        break;

    case "cargar_datos":
        $datos = $logros->get_logros();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "nom_log" => $row["nom_log"],
                "lugar_log" => $row["lugar_log"],
                "fech_log" => $row["fech_log"]
            ];
        }

        echo json_encode($output);
        break;

    // Llenar en el formulario perfil los datos del logros
    case "mostrar_datos":
        $datos = $logros->get_logros_x_id($_POST["id_log"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_log"] = $row["id_log"];
                $output["nom_log"] = $row["nom_log"];
                $output["lugar_log"] = $row["lugar_log"];
                $output["fech_log"] = $row["fech_log"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar":
        $logros->delete_logros($_POST["id_log"]);
        break;
}
?>