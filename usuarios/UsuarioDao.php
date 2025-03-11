<?php

require_once "DataSource.php";
require_once "Usuario.php";
require_once "IDao.php";

class UsuarioDao implements IDao {
    private $dataSource;

    public function __construct() {
        $this->dataSource = new DataSource();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM usuarios";
        $data = $this->dataSource->ejecutarConsulta($sql);

        $usuarios = [];

        foreach ($data as $usuario) {
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->setId($usuario['id']);
            $nuevoUsuario->setName($usuario['nombres']);
            $nuevoUsuario->setLastNames($usuario['apellidos']);
            $nuevoUsuario->setEmail($usuario['correo']);
            $usuarios[] = $nuevoUsuario;
        }

        return $usuarios;
    }

    public function buscar($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $values = [
            'id' => $id
        ];
        return $this->dataSource->ejecutarConsulta($sql, $values);
    }

    public function insertar(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nombres, apellidos, correo, password) VALUES (:nombres, :apellidos, :correo, :password)";
        $values = [
            ':nombres' => $usuario->getName(),
            ':apellidos' => $usuario->getLastNames(),
            ':correo' => $usuario->getEmail(),
            ':password' => $usuario->getPassword()
        ];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }


    public function actualizar(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nombres = :nombres, apellidos = :apellidos, correo = :correo WHERE id = :id";
        $values = [
            ':nombres' => $usuario->getName(),
            ':apellidos' => $usuario->getLastNames(),
            ':correo' => $usuario->getEmail(),
            ':id' => $usuario->getId()
        ];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $values = [
            'id' => $id
        ];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }
    
    public function guardar(Usuario $usuario) {
        return $this->insertar($usuario);
    }
}
?>