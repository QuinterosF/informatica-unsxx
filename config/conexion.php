<?php
    /* Inicializando la sesion del usuario */
    session_start();

    /* Clase conectar */
    class Conectar{
        protected $dbh;

        /* funcion protegida de la cadena conexion */
        protected function conexion() {
            try {
                /* Cadena de conexion */
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=informatica","root","");
                return $conectar;
            } catch (Exception $e) {
                print "Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        /* Para impedir tener problemas con los caracteres especiales del español */
        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* Ruta principal del proyecto */
        public static function ruta() {
            return "http://127.0.0.2/informaticaUNSXX_v2/";
        }
    }
?>