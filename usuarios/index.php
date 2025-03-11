<?php

require_once 'Usuario.php';
require_once 'UsuarioDao.php';

// Creo un objeto del tipo UsuarioDAO, el que interactúa con la DB
$usuarioDAO = new UsuarioDao();

// Creo un objeto del tipo Usuario
$bugs = new Usuario();
$bugs->setName('Bugs');
$bugs->setLastNames('Bunny');
$bugs->setEmail('bugsbunny@wb.com');
$bugs->setPassword("contraseñaDeBugs");

$lola = new Usuario();
$lola->setName('Lola');
$lola->setLastNames('Bunny');
$lola->setEmail('lolabunny@wb.com');
$lola->setPassword("contraseñaDeLola");

$lucas = new Usuario();
$lucas->setName('Daffy');
$lucas->setLastNames('Duck');
$lucas->setEmail('patolucas@wb.com');
$lucas->setPassword("contraseñaDeLola");

$porky = new Usuario();
$porky->setName('Porki');
$porky->setLastNames('Pig');
$porky->setEmail('porkipig@wb.com');
$porky->setPassword("contraseñaDeLola");

// Inserto los usuarios en la base de datos
$usuarioDAO->insertar($bugs);
$usuarioDAO->insertar($lola);
$usuarioDAO->insertar($lucas);
$usuarioDAO->insertar($porky);

// Obtengo todos los usuarios de la base de datos
$usuarios = $usuarioDAO->buscarTodos();

foreach ($usuarios as $usuario) {
    echo $usuario->getName() . ' ' . $usuario->getLastNames() . ' ' . $usuario->getEmail() . '<br>';
}
?>