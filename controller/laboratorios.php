<?php
/* llamando a cadena de conexion */
require_once("../config/conexion.php");
/* llamando a la clase */
require_once("../models/Laboratorios.php");
/* inicializando clase */
$laboratorios = new Laboratorios();

/* opcion de solicitud de controller */
switch ($_GET["op"]) {
    case "guardar_editar_lab_seg":
        if (isset($_FILES['horario_lab_seg']) && $_FILES['horario_lab_seg']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_seg']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_seg']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_seg"])) {
                $laboratorios->insert_laboratorios(
                    1,
                    $_POST["resp_lab_seg"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_seg"],
                    $_POST["resp_lab_seg"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_seg":
        $datos = $laboratorios->cargar_resp_lab(1);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_seg":
        $datos = $laboratorios->get_lab(1);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "guardar_editar_lab_mov":
        if (isset($_FILES['horario_lab_mov']) && $_FILES['horario_lab_mov']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_mov']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_mov']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_mov"])) {
                $laboratorios->insert_laboratorios(
                    2,
                    $_POST["resp_lab_mov"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_mov"],
                    $_POST["resp_lab_mov"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_mov":
        $datos = $laboratorios->cargar_resp_lab(2);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_mov":
        $datos = $laboratorios->get_lab(2);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "guardar_editar_lab_hd":
        if (isset($_FILES['horario_lab_hd']) && $_FILES['horario_lab_hd']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_hd']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_hd']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_hd"])) {
                $laboratorios->insert_laboratorios(
                    3,
                    $_POST["resp_lab_hd"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_hd"],
                    $_POST["resp_lab_hd"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_hd":
        $datos = $laboratorios->cargar_resp_lab(3);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_hd":
        $datos = $laboratorios->get_lab(3);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "guardar_editar_lab_swi":
        if (isset($_FILES['horario_lab_swi']) && $_FILES['horario_lab_swi']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_swi']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_swi']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_swi"])) {
                $laboratorios->insert_laboratorios(
                    4,
                    $_POST["resp_lab_swi"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_swi"],
                    $_POST["resp_lab_swi"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_swi":
        $datos = $laboratorios->cargar_resp_lab(4);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_swi":
        $datos = $laboratorios->get_lab(4);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;


    case "guardar_editar_lab_swii":
        if (isset($_FILES['horario_lab_swii']) && $_FILES['horario_lab_swii']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_swii']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_swii']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_swii"])) {
                $laboratorios->insert_laboratorios(
                    5,
                    $_POST["resp_lab_swii"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_swii"],
                    $_POST["resp_lab_swii"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_swii":
        $datos = $laboratorios->cargar_resp_lab(5);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_swii":
        $datos = $laboratorios->get_lab(5);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;

    case "guardar_editar_lab_swiii":
        if (isset($_FILES['horario_lab_swiii']) && $_FILES['horario_lab_swiii']['error'] === UPLOAD_ERR_OK) {
            $nombre_pdf = $_FILES['horario_lab_swiii']['name'];

            // Mueve el archivo a la carpeta
            move_uploaded_file($_FILES['horario_lab_swiii']['tmp_name'], '../docs/horarios/' . $nombre_pdf);

            // Luego de subir el archivo, puedes guardar solo el nombre en la base de datos
            if (empty($_POST["id_lab_swiii"])) {
                $laboratorios->insert_laboratorios(
                    6,
                    $_POST["resp_lab_swiii"],
                    $nombre_pdf
                );
            } else {
                $laboratorios->update_laboratorios(
                    $_POST["id_lab_swiii"],
                    $_POST["resp_lab_swiii"],
                    $nombre_pdf
                );
            }
        }
        break;

    case "cargar_resp_lab_swiii":
        $datos = $laboratorios->cargar_resp_lab(6);
        $output = array();
        foreach ($datos as $row) {
            $output["id_lab"] = $row["id_lab"];
            $output["resp_lab"] = $row["resp_lab"];
        }
        echo json_encode($output);
        break;

    case "cargar_lab_swiii":
        $datos = $laboratorios->get_lab(6);
        $output = array();

        foreach ($datos as $row) {
            $output[] = [
                "horario_lab" => $row["horario_lab"],
                "nom_acad" => $row["nom_acad"],
                "foto_acad" => $row["foto_acad"],
                "cel_acad" => $row["cel_acad"],
                "email_acad" => $row["email_acad"]
            ];
        }

        echo json_encode($output);
        break;
}
?>