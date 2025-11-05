<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Inicio.php");
/* inicializando clase */
$inicio = new Inicio();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "cargar_inicio":
        $datos = $inicio->cargar_inicio();
        $output = array();
        foreach ($datos as $row) {
            $output["id_inc"] = $row["id_inc"];
            $output["afiche"] = $row["afiche"];
            $output["presentacion"] = $row["presentacion"];
            $output["perfil"] = $row["perfil"];
            $output["mision"] = $row["mision"];
            $output["vision"] = $row["vision"];
            $output["objetivo"] = $row["objetivo"];
            $output["historia"] = $row["historia"];
        }
        echo json_encode($output);
        break;

    case "guardar_editar_presentacion":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_presentacion(
                $_POST["presentacion"]
            );
        } else {
            $inicio->update_presentacion(
                $_POST["presentacion"]
            );
        }
        break;

    case "guardar_editar_perfil":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_perfil(
                $_POST["perfil"]
            );
        } else {
            $inicio->update_perfil(
                $_POST["perfil"]
            );
        }
        break;

    case "guardar_editar_mision":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_mision(
                $_POST["mision"]
            );
        } else {
            $inicio->update_mision(
                $_POST["mision"]
            );
        }
        break;

    case "guardar_editar_vision":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_vision(
                $_POST["vision"]
            );
        } else {
            $inicio->update_vision(
                $_POST["vision"]
            );
        }
        break;

    case "guardar_editar_objetivo":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_objetivo(
                $_POST["objetivo"]
            );
        } else {
            $inicio->update_objetivo(
                $_POST["objetivo"]
            );
        }
        break;

    case "guardar_editar_historia":
        if (empty($_POST["id_inc"])) {
            $inicio->insert_historia(
                $_POST["historia"]
            );
        } else {
            $inicio->update_historia(
                $_POST["historia"]
            );
        }
        break;

    case "guardar_editar_afiche":
        if (isset($_FILES['nom_afiche']) && $_FILES['nom_afiche']['error'] === UPLOAD_ERR_OK) {
            $nombre_afiche = $_FILES['nom_afiche']['name'];

            // Mueve el archivo a la carpeta images con su nombre original
            move_uploaded_file($_FILES['nom_afiche']['tmp_name'], '../images/' . $nombre_afiche);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_inc"])) {
                $inicio->insert_afiche(
                    $nombre_afiche
                );
            } else {
                $inicio->update_afiche(
                    $nombre_afiche
                );
            }
        }
        break;
}
?>