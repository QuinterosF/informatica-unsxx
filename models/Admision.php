<?php
class Admision extends Conectar
{
    public function insert_admision($id_adm, $proc_adm, $req_adm, $img_adm)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO admision (id_adm, proc_adm, req_adm, img_adm) VALUES (?, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_adm);
        $sql->bindValue(2, $proc_adm);
        $sql->bindValue(3, $req_adm);
        $sql->bindValue(4, $img_adm);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_admision($id_adm, $proc_adm, $req_adm, $img_adm)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE admision
            SET
                proc_adm = ?,
                req_adm = ?,
                img_adm  = ?
            WHERE
                id_adm = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $proc_adm);
        $sql->bindValue(2, $req_adm);
        $sql->bindValue(3, $img_adm);
        $sql->bindValue(4, $id_adm);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_admision($id_adm) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM admision WHERE id_adm = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_adm);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>