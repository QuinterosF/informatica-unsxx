<?php
class Logros extends Conectar
{
    /*  
    ################## CRUD logros ###################

    Mostrar datos del usuario en una tabla */
    public function get_for_table()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM logros;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_logros()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM logros ORDER BY fech_log DESC;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_logros($nom_log, $lugar_log, $fech_log)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                logros (id_log, nom_log, lugar_log, fech_log) 
            VALUES 
                (NULL, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_log);
        $sql->bindValue(2, $lugar_log);
        $sql->bindValue(3, $fech_log);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_logros($id_log, $nom_log, $lugar_log, $fech_log)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE logros
            SET 
                nom_log = ?,
                lugar_log = ?,
                fech_log = ?
            WHERE
            id_log=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_log);
        $sql->bindValue(2, $lugar_log);
        $sql->bindValue(3, $fech_log);
        $sql->bindValue(4, $id_log);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Mostrar los datos del usuario segun el id
    public function get_logros_x_id($id_log)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM logros WHERE id_log=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_log);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_logros($id_log)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM logros WHERE id_log=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_log);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>