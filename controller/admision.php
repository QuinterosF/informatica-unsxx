<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Admision.php");
/* inicializando clase */
$admision = new Admision();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "guardar_editar_prueba":
        if (isset($_FILES['img_adm_test']) && $_FILES['img_adm_test']['error'] === UPLOAD_ERR_OK) {
            $nombre_afiche = $_FILES['img_adm_test']['name'];

            // Mueve el archivo a la carpeta images con su nombre original
            move_uploaded_file($_FILES['img_adm_test']['tmp_name'], '../images/' . $nombre_afiche);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            // Si es nuevo registro
            if (empty($_POST["idx_adm_test"])) {
                $admision->insert_admision(
                    $_POST["id_adm_test"],
                    $_POST["proc_adm_test"],
                    $_POST["req_adm_test"],
                    $nombre_afiche
                );
            } else {
                $admision->update_admision(
                    $_POST["id_adm_test"],
                    $_POST["proc_adm_test"],
                    $_POST["req_adm_test"],
                    $nombre_afiche
                );
            }
        }
        break;

    case "cargar_prueba":
        $datos = $admision->cargar_admision(1);
        $output = array();
        foreach ($datos as $row) {
            $output["id_adm"] = $row["id_adm"];
            $output["proc_adm"] = $row["proc_adm"];
            $output["req_adm"] = $row["req_adm"];
            $output["img_adm"] = $row["img_adm"];
        }
        echo json_encode($output);
        break;

    case "guardar_editar_preuni":
        if (isset($_FILES['img_adm_pre']) && $_FILES['img_adm_pre']['error'] === UPLOAD_ERR_OK) {
            $nombre_afiche = $_FILES['img_adm_pre']['name'];

            // Mueve el archivo a la carpeta images con su nombre original
            move_uploaded_file($_FILES['img_adm_pre']['tmp_name'], '../images/' . $nombre_afiche);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            // Si es nuevo registro
            if (empty($_POST["idx_adm_pre"])) {
                $admision->insert_admision(
                    $_POST["id_adm_pre"],
                    $_POST["proc_adm_pre"],
                    $_POST["req_adm_pre"],
                    $nombre_afiche
                );
            } else {
                $admision->update_admision(
                    $_POST["id_adm_pre"],
                    $_POST["proc_adm_pre"],
                    $_POST["req_adm_pre"],
                    $nombre_afiche
                );
            }
        }
        break;

    case "cargar_preuni":
        $datos = $admision->cargar_admision(2);
        $output = array();
        foreach ($datos as $row) {
            $output["id_adm"] = $row["id_adm"];
            $output["proc_adm"] = $row["proc_adm"];
            $output["req_adm"] = $row["req_adm"];
            $output["img_adm"] = $row["img_adm"];
        }
        echo json_encode($output);
        break;
}
?>