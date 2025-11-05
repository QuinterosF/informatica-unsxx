<?php
class Usuario extends Conectar
{
    /* Funcion para login de acceso del usuario */
    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if (empty($correo) or empty($pass)) {
                /* En caso este vacio correo y pass, devolver al admin.php con mensaje = 2 */
                header("Location:" . Conectar::ruta() . "admin.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuario WHERE usu_correo=? and usu_pass=? and estado=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $pass);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];
                    $_SESSION["acerca_de"] = $resultado["acerca_de"];
                    $_SESSION["carrera"] = $resultado["carrera"];
                    $_SESSION["comunicados"] = $resultado["comunicados"];
                    $_SESSION["laboratorios"] = $resultado["laboratorios"];
                    $_SESSION["docentes"] = $resultado["docentes"];
                    $_SESSION["extension"] = $resultado["extension"];
                    $_SESSION["usuarios"] = $resultado["usuarios"];
                    
                    /* si todo está correcto indexar en UsuHome */
                    header("Location:" . Conectar::ruta() . "view/UsuPerfil");
                    exit();
                } else {
                    /* En caso no coincidan el usuario o el pass */
                    header("Location:" . Conectar::ruta() . "admin.php?m=1");
                    exit();
                }
            }
        }
    }

    // Mostrar los datos del usuario segun el id
    public function get_usuario_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT usu_nom, usu_correo, usu_pass FROM usuario WHERE estado=1 AND usu_id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* Actualizar los datos del perfil */
    public function update_usuario_perfil($usu_id, $usu_nom, $usu_correo, $usu_pass)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario 
                SET
                    usu_nom = ?,
                    usu_correo = ?,
                    usu_pass = ?
                WHERE 
                    usu_id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $usu_pass);
        $sql->bindValue(4, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    /* Mostrar datos del usuario en una tabla */
    public function get_usuario()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE estado = 1 AND usuarios = 0;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function verificar_correo_existente($usu_correo){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as total FROM usuario WHERE usu_correo =?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_correo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_usuario(
        $usu_nom,
        $usu_correo,
        $acerca_de,
        $carrera,
        $comunicados,
        $laboratorios,
        $docentes,
        $extension
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                usuario (
                    usu_id,
                    usu_nom,
                    usu_correo,
                    usu_pass,
                    estado,
                    acerca_de,
                    carrera,
                    comunicados,
                    laboratorios,
                    docentes,
                    extension,
                    usuarios
                ) 
            VALUES 
                (NULL, ?, ?, 'infor', '1', ?, ?, ?, ?, ?, ?, '0');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $acerca_de);
        $sql->bindValue(4, $carrera);
        $sql->bindValue(5, $comunicados);
        $sql->bindValue(6, $laboratorios);
        $sql->bindValue(7, $docentes);
        $sql->bindValue(8, $extension);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_usuario(
        $usu_id,
        $usu_nom,
        $usu_correo,
        $acerca_de,
        $carrera,
        $comunicados,
        $laboratorios,
        $docentes,
        $extension
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario
            SET 
                usu_nom=?,
                usu_correo=?,
                acerca_de=?,
                carrera=?,
                comunicados=?,
                laboratorios=?,
                docentes=?,
                extension=?
            WHERE
                usu_id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nom);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $acerca_de);
        $sql->bindValue(4, $carrera);
        $sql->bindValue(5, $comunicados);
        $sql->bindValue(6, $laboratorios);
        $sql->bindValue(7, $docentes);
        $sql->bindValue(8, $extension);
        $sql->bindValue(9, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_usuario_x_id_for_edit($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM usuario WHERE estado=1 AND usu_id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_usuario($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE usuario
            SET
                estado=0
            WHERE 
                usu_id=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>