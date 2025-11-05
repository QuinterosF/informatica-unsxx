<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Usuario.php");
/* inicializando clase */
$usuario = new Usuario();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    // Llenar en el formulario perfil los datos del usuario
    case "mostrar_datos_perfil":
        $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_correo"] = $row["usu_correo"];
                $output["usu_pass"] = $row["usu_pass"];
            }
            echo json_encode($output);
        }
        break;

    /* Actualizar los datos de perfil del usuario */
    case "update_perfil":
        $usuario->update_usuario_perfil(
            $_POST["usu_id"],
            $_POST["usu_nom"],
            $_POST["usu_correo"],
            $_POST["usu_pass"]
        );
        break;

    /* Listar toda la informacion segun el formato del datatable */
    case "listar":
        $datos = $usuario->get_usuario();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["usu_nom"];

            $permisos = "<ul>";
            if ($row["acerca_de"] == "1") {
                $permisos .= "<li>Acerca de</li>";
            }
            if ($row["carrera"] == 1) {
                $permisos .= "<li>Carrera</li>";
            }
            if ($row["comunicados"] == 1) {
                $permisos .= "<li>Comunicados</li>";
            }
            if ($row["laboratorios"] == 1) {
                $permisos .= "<li>Laboratorios</li>";
            }
            if ($row["docentes"] == 1) {
                $permisos .= "<li>Plantel Docente</li>";
            }
            if ($row["extension"] == 1) {
                $permisos .= "<li>Extensión</li>";
            }
            $permisos = $permisos . "</ul>";
            $sub_array[] = $permisos;

            $sub_array[] = '<button type="button" title="Editar" onClick="editar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar(' . $row["usu_id"] . ');" id="' . $row["usu_id"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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

    case "verificar_correo_existente":
        $datos = $usuario->verificar_correo_existente($_POST["usu_correo"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;

    case "guardar_editar":
        if (empty($_POST["usu_id"])) {
            $usuario->insert_usuario(
                $_POST["usu_nom"],
                $_POST["usu_correo"],
                $_POST["acerca_de"],
                $_POST["carrera"],
                $_POST["comunicados"],
                $_POST["laboratorios"],
                $_POST["docentes"],
                $_POST["extension"]
            );
        } else {
            $usuario->update_usuario(
                $_POST["usu_id"],
                $_POST["usu_nom"],
                $_POST["usu_correo"],
                $_POST["acerca_de"],
                $_POST["carrera"],
                $_POST["comunicados"],
                $_POST["laboratorios"],
                $_POST["docentes"],
                $_POST["extension"]
            );
        }
        break;

    case "show_for_edit":
        $datos = $usuario->get_usuario_x_id_for_edit($_POST["usu_id"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_correo"] = $row["usu_correo"];
                $output["acerca_de"] = $row["acerca_de"];
                $output["carrera"] = $row["carrera"];
                $output["comunicados"] = $row["comunicados"];
                $output["laboratorios"] = $row["laboratorios"];
                $output["docentes"] = $row["docentes"];
                $output["extension"] = $row["extension"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar":
        $dato = $usuario->delete_usuario($_POST["usu_id"]);
        break;
}
?>