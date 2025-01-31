<?php

function piedraPapelTijeraLagartoSpock($jugador1, $jugador2) {
    // Definir las opciones y sus nombres
    $opciones = array(
        0 => "Piedra",
        1 => "Papel",
        2 => "Tijera",
        3 => "Lagarto",
        4 => "Spock"
    );

    // Mostrar las manos de cada jugador
    echo "Jugador 1: " . $opciones[$jugador1] . "\n";
    echo "Jugador 2: " . $opciones[$jugador2] . "\n";

    // Lógica del juego
    if ($jugador1 == $jugador2) {
        echo "¡Empate!\n";
    } elseif (
        ($jugador1 == 0 && ($jugador2 == 2 || $jugador2 == 3)) || // Piedra gana a Tijera y Lagarto
        ($jugador1 == 1 && ($jugador2 == 0 || $jugador2 == 4)) || // Papel gana a Piedra y Spock
        ($jugador1 == 2 && ($jugador2 == 1 || $jugador2 == 3)) || // Tijera gana a Papel y Lagarto
        ($jugador1 == 3 && ($jugador2 == 1 || $jugador2 == 4)) || // Lagarto gana a Papel y Spock
        ($jugador1 == 4 && ($jugador2 == 0 || $jugador2 == 2))    // Spock gana a Piedra y Tijera
    ) {
        echo "¡Jugador 1 gana!\n";
    } else {
        echo "¡Jugador 2 gana!\n";
    }
}

// Obtener los argumentos de la línea de comandos
if (isset($argv[1]) && isset($argv[2])) {
    $jugador1 = intval($argv[1]);
    $jugador2 = intval($argv[2]);

    // Validar los argumentos
    if (
        $jugador1 >= 0 && $jugador1 <= 4 &&
        $jugador2 >= 0 && $jugador2 <= 4
    ) {
        piedraPapelTijeraLagartoSpock($jugador1, $jugador2);
    } else {
        echo "Error: Argumentos inválidos. Los valores deben estar entre 0 y 4.\n";
    }
} else {
    echo "Uso: php piedra_papel_tijera_lagarto_spock.php <jugador1> <jugador2>\n";
}

?>