<?php
class Celulares extends Conectar
{
    /*  
    ################## CRUD celulares ###################

    Mostrar datos del usuario en una tabla */
    public function get_for_table()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM celulares;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_celulares()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM celulares ORDER BY nom_cel ASC;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_celulares($nom_cel, $num_cel)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                celulares (id_cel, nom_cel, num_cel) 
            VALUES 
                (NULL, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_cel);
        $sql->bindValue(2, $num_cel);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_celulares($id_cel, $nom_cel, $num_cel)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE celulares
            SET 
                nom_cel = ?,
                num_cel = ?
            WHERE
            id_cel=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_cel);
        $sql->bindValue(2, $num_cel);
        $sql->bindValue(3, $id_cel);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Mostrar los datos del usuario segun el id
    public function get_celulares_x_id($id_cel)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM celulares WHERE id_cel=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_cel);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_celulares($id_cel)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM celulares WHERE id_cel=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_cel);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>