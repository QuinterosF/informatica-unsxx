<?php
class Comunicados extends Conectar
{
    // ################## CRUD comunicados ###################
    public function insert_comunicados($nom_com, $desc_com, $doc_com, $foto_com, $fech_com)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                comunicados (id_com, nom_com, desc_com, doc_com, foto_com, fech_com) 
            VALUES 
                (NULL, ?, ?, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_com);
        $sql->bindValue(2, $desc_com);
        $sql->bindValue(3, $doc_com);
        $sql->bindValue(4, $foto_com);
        $sql->bindValue(5, $fech_com);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_comunicados($id_com, $nom_com, $desc_com, $doc_com, $foto_com)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE comunicados
            SET 
                nom_com = ?,
                desc_com = ?,
                doc_com = ?,
                foto_com = ?
            WHERE
                id_com=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_com);
        $sql->bindValue(2, $desc_com);
        $sql->bindValue(3, $doc_com);
        $sql->bindValue(4, $foto_com);
        $sql->bindValue(5, $id_com);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Mostrar datos del usuario en una tabla
    public function get_for_table()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM comunicados;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cant_paginas()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as total FROM comunicados;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function paginacion($offset)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM comunicados ORDER BY fech_com DESC LIMIT 5 OFFSET ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, intval($offset), PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mostrar los datos del usuario segun el id
    public function get_comunicados_x_id($id_com)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_com, nom_com, desc_com FROM comunicados WHERE id_com=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_com);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_comunicado($id_com)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM comunicados WHERE id_com=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_com);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>