<?php
class Academico extends Conectar
{
    /*  
    ################## CRUD ACADEMICO ###################

    Mostrar datos del usuario en una tabla */
    public function get_for_table()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_academico()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos ORDER BY nom_acad ASC;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificar_correo_existente($email_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as total FROM academicos WHERE email_acad =?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $email_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_academico($nom_acad, $foto_acad, $cel_acad, $email_acad, $cat_acad, $desc_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO 
                academicos (id_acad, nom_acad, foto_acad, cel_acad, email_acad, cat_acad, desc_acad) 
            VALUES 
                (NULL, ?, ?, ?, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_acad);
        $sql->bindValue(2, $foto_acad);
        $sql->bindValue(3, $cel_acad);
        $sql->bindValue(4, $email_acad);
        $sql->bindValue(5, $cat_acad);
        $sql->bindValue(6, $desc_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_academico($id_acad, $nom_acad, $foto_acad, $cel_acad, $email_acad, $cat_acad, $desc_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE academicos
            SET 
                nom_acad = ?,
                foto_acad = ?,
                cel_acad = ?,
                email_acad = ?,
                cat_acad = ?,
                desc_acad = ?
            WHERE
                id_acad=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nom_acad);
        $sql->bindValue(2, $foto_acad);
        $sql->bindValue(3, $cel_acad);
        $sql->bindValue(4, $email_acad);
        $sql->bindValue(5, $cat_acad);
        $sql->bindValue(6, $desc_acad);
        $sql->bindValue(7, $id_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    // Mostrar los datos del usuario segun el id
    public function get_academico_x_id($id_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE id_acad=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_academico($id_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM academicos WHERE id_acad=?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_director()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_acad FROM academicos WHERE cat_acad = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function director_a_docente()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE academicos SET cat_acad = 2 WHERE cat_acad = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function actualizar_director($id_acad)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE academicos SET cat_acad = 1 WHERE id_acad = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_acad);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_director()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE cat_acad = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function coordinador_a_docente()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE academicos SET cat_acad = 2 WHERE cat_acad IN (3, 4, 5, 6);";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function actualizar_coordinador($academico, $seguridad, $movil, $iidai)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Comienza la transacción
        $conectar->beginTransaction();

        try {
            // Primera consulta
            $sql1 = "UPDATE academicos SET cat_acad = 3 WHERE id_acad = ?";
            $stmt1 = $conectar->prepare($sql1);
            $stmt1->bindValue(1, $academico);
            $stmt1->execute();

            // Segunda consulta
            $sql2 = "UPDATE academicos SET cat_acad = 4 WHERE id_acad = ?";
            $stmt2 = $conectar->prepare($sql2);
            $stmt2->bindValue(1, $movil);
            $stmt2->execute();

            // Tercera consulta
            $sql3 = "UPDATE academicos SET cat_acad = 5 WHERE id_acad = ?";
            $stmt3 = $conectar->prepare($sql3);
            $stmt3->bindValue(1, $seguridad);
            $stmt3->execute();

            // Cuarta consulta
            $sql4 = "UPDATE academicos SET cat_acad = 6 WHERE id_acad = ?";
            $stmt4 = $conectar->prepare($sql4);
            $stmt4->bindValue(1, $iidai);
            $stmt4->execute();

            // Si no hay errores, confirma la transacción
            $conectar->commit();
        } catch (Exception $e) {
            // Si hay errores, deshace la transacción y maneja el error
            $conectar->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    public function cargar_academico()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_acad FROM academicos WHERE cat_acad = 3;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_movil()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_acad FROM academicos WHERE cat_acad = 4;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_seguridad()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_acad FROM academicos WHERE cat_acad = 5;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function cargar_iidai()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_acad FROM academicos WHERE cat_acad = 6;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_academico_coor()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE cat_acad = 3;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_movil()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE cat_acad = 4;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_seguridad()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE cat_acad = 5;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_iidai()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM academicos WHERE cat_acad = 6;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>