<?php

class DataSource {

    //Constructor
    public function __construct () {

        //Establecemos la conexion con la base de datos que realizamos

        //Usando PDO que es una clase que representa la conexion entre PHP y mi servidor de bases de datos
        try {
            $this->cadenaParaConexion = "mysql:host=127.0.0.1;dbname=prueba";
            $this->conexion = new PDO($this->cadenaParaConexion, "root", "root");
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }
    }

    public function ejecutarConsulta($sql = "", $values = []) {
        if($sql != "") {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }

    public function ejecutarActualizacion ($sql = "", $values = []) {
        if($sql != "") {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            return $consulta->rowCount();
        } else {
            return 0;
        }
    }

}