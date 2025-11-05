<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/celulares.php");
/* inicializando clase */
$celulares = new Celulares();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {

    /* Listar toda la informacion segun el formato del datatable */
    case "listar":
        $datos = $celulares->get_for_table();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["nom_cel"];
            $sub_array[] = $row["num_cel"];
            $sub_array[] = '<button type="button" title="Editar" onClick="editar_cel(' . $row["id_cel"] . ');" id="' . $row["id_cel"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar_cel(' . $row["id_cel"] . ');" id="' . $row["id_cel"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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
        if (empty($_POST["id_cel"])) {
            $celulares->insert_celulares(
                $_POST["nom_cel"],
                $_POST["num_cel"]
            );
        } else {
            $celulares->update_celulares(
                $_POST["id_cel"],
                $_POST["nom_cel"],
                $_POST["num_cel"]
            );
        }
        break;

    case "cargar_datos":
        $datos = $celulares->get_celulares();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "nom_cel" => $row["nom_cel"],
                "num_cel" => $row["num_cel"]
            ];
        }

        echo json_encode($output);
        break;

    // Llenar en el formulario perfil los datos del celulares
    case "mostrar_datos":
        $datos = $celulares->get_celulares_x_id($_POST["id_cel"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_cel"] = $row["id_cel"];
                $output["nom_cel"] = $row["nom_cel"];
                $output["num_cel"] = $row["num_cel"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar":
        $celulares->delete_celulares($_POST["id_cel"]);
        break;
}
?>