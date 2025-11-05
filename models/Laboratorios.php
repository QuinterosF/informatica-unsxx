<?php
class Laboratorios extends Conectar
{
    public function insert_laboratorios($id_lab, $resp_lab, $horario_lab)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                laboratorios (id_lab, resp_lab, horario_lab) 
            VALUES 
                (?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_lab);
        $sql->bindValue(2, $resp_lab);
        $sql->bindValue(3, $horario_lab);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_laboratorios($id_lab, $resp_lab, $horario_lab)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE laboratorios
            SET 
                resp_lab = ?,
                horario_lab = ?
            WHERE
                id_lab=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $resp_lab);
        $sql->bindValue(2, $horario_lab);
        $sql->bindValue(3, $id_lab);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_resp_lab($id_lab)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_lab, resp_lab FROM laboratorios WHERE id_lab = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_lab);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_lab($id_lab)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT horario_lab, nom_acad, foto_acad, cel_acad, email_acad
                FROM laboratorios
                JOIN academicos ON laboratorios.resp_lab = academicos.id_acad
                WHERE laboratorios.id_lab = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_lab);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>