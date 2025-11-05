<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Academico.php");
/* inicializando clase */
$academico = new Academico();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {

    /* Listar toda la informacion segun el formato del datatable */
    case "listar":
        $datos = $academico->get_for_table();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = '<center><img src="../../images/perfil_academico/' . $row["foto_acad"] . '" alt="" height="60px" max-width="60px"></center>';
            $sub_array[] = $row["nom_acad"];
            $sub_array[] = $row["cel_acad"];
            $sub_array[] = $row["email_acad"];
            $sub_array[] = '<button type="button" title="Editar" onClick="editar(' . $row["id_acad"] . ');" id="' . $row["id_acad"] . '" class="btn btn-outline-teal btn-icon"><div><i class="icon ion-edit"></i></div></button>';
            $sub_array[] = '<button type="button" title="Eliminar" onClick="eliminar(' . $row["id_acad"] . ');" id="' . $row["id_acad"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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
        $datos = $academico->verificar_correo_existente($_POST["email_acad"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["total"] = $row["total"];
            }
            echo json_encode($output);
        }
        break;

    case "guardar_editar":
        if (isset($_FILES['foto_acad']) && $_FILES['foto_acad']['error'] === UPLOAD_ERR_OK) {
            $nombre_foto = $_FILES['foto_acad']['name'];

            // Mueve el archivo a la carpeta images con su nombre original
            move_uploaded_file($_FILES['foto_acad']['tmp_name'], '../images/perfil_academico/' . $nombre_foto);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_acad"])) {
                $academico->insert_academico(
                    $_POST["nom_acad"],
                    $nombre_foto,
                    $_POST["cel_acad"],
                    $_POST["email_acad"],
                    $_POST["cat_acad"],
                    $_POST["desc_acad"]
                );
            } else {
                $academico->update_academico(
                    $_POST["id_acad"],
                    $_POST["nom_acad"],
                    $nombre_foto,
                    $_POST["cel_acad"],
                    $_POST["email_acad"],
                    $_POST["cat_acad"],
                    $_POST["desc_acad"]
                );
            }
        }
        break;

    case "cargar_datos":
        $datos = $academico->get_academico();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;

    // Llenar en el formulario perfil los datos del academico
    case "mostrar_datos_perfil":
        $datos = $academico->get_academico_x_id($_POST["id_acad"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id_acad"] = $row["id_acad"];
                $output["nom_acad"] = $row["nom_acad"];
                $output["cel_acad"] = $row["cel_acad"];
                $output["email_acad"] = $row["email_acad"];
                $output["desc_acad"] = $row["desc_acad"];
                $output["foto_acad"] = $row["foto_acad"];
            }
            echo json_encode($output);
        }
        break;

    case "eliminar":
        // Elimina el archivo de la carpeta images con su nombre original
        //unlink('../images/perfil_academico/' . $_POST["foto_acad"]);

        $academico->delete_academico($_POST["id_acad"]);
        break;

    case "cargar_director":
        $datos = $academico->cargar_director();
        $output = array();
        foreach ($datos as $row) {
            $output["id_acad"] = $row["id_acad"];
        }
        echo json_encode($output);
        break;

    case "combo":
        $datos = $academico->get_for_table();
        if (is_array($datos) == true and count($datos) > 0) {
            $html = '<option label="Seleccione"></option>';
            foreach ($datos as $row) {
                $html .= '<option value="' . $row['id_acad'] . '">' . $row['nom_acad'] . '</option>';
            }
            echo $html;
        }
        break;

    case "actualizar_director":
        //Primero el antiguo director lo volvemos docente
        $academico->director_a_docente();

        //Luego asignamos al nuevo director xD
        $academico->actualizar_director($_POST["director"]);
        break;

    case "cargar_datos_director":
        $datos = $academico->get_director();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "actualizar_coordinador":
        // Primero los antiguos directores lo volvemos docente
        $academico->coordinador_a_docente();

        // Luego asignamos al nuevo director
        $academico->actualizar_coordinador($_POST["academico"], $_POST["seguridad"], $_POST["movil"], $_POST["iidai"]);
        break;

    case "cargar_academico":
        $datos = $academico->cargar_academico();
        $output = array();
        foreach ($datos as $row) {
            $output["id_acad"] = $row["id_acad"];
        }
        echo json_encode($output);
        break;

    case "cargar_seguridad":
        $datos = $academico->cargar_seguridad();
        $output = array();
        foreach ($datos as $row) {
            $output["id_acad"] = $row["id_acad"];
        }
        echo json_encode($output);
        break;

    case "cargar_movil":
        $datos = $academico->cargar_movil();
        $output = array();
        foreach ($datos as $row) {
            $output["id_acad"] = $row["id_acad"];
        }
        echo json_encode($output);
        break;

    case "cargar_iidai":
        $datos = $academico->cargar_iidai();
        $output = array();
        foreach ($datos as $row) {
            $output["id_acad"] = $row["id_acad"];
        }
        echo json_encode($output);
        break;

    case "cargar_datos_academico":
        $datos = $academico->get_academico_coor();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "cargar_datos_seguridad":
        $datos = $academico->get_seguridad();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "cargar_datos_movil":
        $datos = $academico->get_movil();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "cargar_datos_iidai":
        $datos = $academico->get_iidai();
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "id_acad" => $row["id_acad"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"],
                "desc_acad" => $row["desc_acad"]
            ];
        }

        echo json_encode($output);
        break;
}
?>