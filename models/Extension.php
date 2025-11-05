<?php
class Extension extends Conectar
{
    // ################## CRUD extension ###################
    public function insert_extension($nom_ext, $fech_ext, $desc_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                extension (id_ext, nom_ext, fech_ext, desc_ext) 
            VALUES 
                (NULL, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_ext);
        $sql->bindValue(2, $fech_ext);
        $sql->bindValue(3, $desc_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_extension($id_ext, $nom_ext, $fech_ext, $desc_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE extension
            SET 
                nom_ext = ?,
                fech_ext = ?,
                desc_ext = ?
            WHERE
                id_ext=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_ext);
        $sql->bindValue(2, $fech_ext);
        $sql->bindValue(3, $desc_ext);
        $sql->bindValue(4, $id_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Mostrar datos del usuario en una tabla
    public function get_for_table_ext()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM extension;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_for_table_fotos($id_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_foto, nom_foto FROM fotos WHERE id_ext = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cant_paginas()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as total FROM extension;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function paginacion_datos_ext($offset)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM extension ORDER BY fech_ext DESC LIMIT 5 OFFSET ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, intval($offset), PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function paginacion_fotos_ext($id_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT nom_foto FROM fotos WHERE id_ext = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ext);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mostrar los datos del usuario segun el id
    public function get_extension_x_id($id_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM extension WHERE id_ext=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_extension($id_ext)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM extension WHERE id_ext=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_nombre_ext($id_ext){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="SELECT nom_ext FROM extension WHERE id_ext=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_ext);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function insert_foto($nom_foto, $id_ext)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO fotos (id_foto, nom_foto, id_ext) VALUES (NULL, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_foto);
        $sql->bindValue(2, $id_ext);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_foto($id_foto)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM fotos WHERE id_foto=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_foto);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>