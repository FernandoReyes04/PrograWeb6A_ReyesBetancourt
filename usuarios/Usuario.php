<?php

require_once 'UsuarioDao.php';

class Usuario {

    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $password;

    public function __construct($id = null) {
            $this->id = $id;
        if($id != null) {
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->buscar($id);
            $this->id = $usuario[0]['id'];
            $this->nombres = $usuario[0]['nombres'];
            $this->apellidos = $usuario[0]['apellidos'];
            $this->correo = $usuario[0]['correo'];
        }
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId ($id) {
        $this->id = $id;
    }

    public function getId () {
        return $this-> id;
    }

    public function setName ($nombres) {
        $this->nombres = $nombres;
    }

    public function getName () {
        return $this->nombres;
    }

    public function setLastNames ($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getLastNames () {
        return $this->apellidos;
    }
    
    public function setEmail ($correo) {
        $this->correo = $correo;
    }

    public function getEmail () {
        return $this->correo;
    }
}