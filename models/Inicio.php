<?php
class Inicio extends Conectar
{
    public function cargar_inicio() {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM inicio WHERE id_inc = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    ################ INICIO PRESENTACION ###############################
    public function insert_presentacion($presentacion) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (presentacion) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $presentacion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_presentacion($presentacion) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET presentacion = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $presentacion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN PRESENTACION ###############################


    ################ INICIO PERFIL ###############################
    public function insert_perfil($perfil) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (perfil) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $perfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_perfil($perfil) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET perfil = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $perfil);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN PERFIL ###############################


    ################ INICIO MISION ###############################
    public function insert_mision($mision)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (mision) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $mision);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_mision($mision) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET mision = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $mision);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN MISION ###############################


    ################ INICIO VISION ###############################
    public function insert_vision($vision)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (vision) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $vision);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_vision($vision) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET vision = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $vision);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN VISION ###############################


    ################ INICIO OBJETIVO ###############################
    public function insert_objetivo($objetivo)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (objetivo) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $objetivo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_objetivo($objetivo) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET objetivo = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $objetivo);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN OBJETIVO ###############################


    ################ INICIO HISTORIA ###############################
    public function insert_historia($historia)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (historia) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $historia);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_historia($historia) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET historia = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $historia);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN HISTORIA ###############################
    

    ################ INICIO AFICHE ###############################
    public function insert_afiche($afiche)  {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO inicio (afiche) VALUES (?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $afiche);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function update_afiche($afiche) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE inicio SET afiche = ? WHERE id_inc=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $afiche);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    ################ FIN AFICHE ###############################
}
?>