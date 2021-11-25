<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/**
 * Agustin Deve: FAI 3158 - Tec. Des. Web - agustin.deve@est.fi.uncoma.edu.ar - GitHub agust1nd
 * Gonzalo Marin Parra: FAI 3598 - Tec. Des. Web - gonzalo.marina@est.fi.uncoma.edu.ar - GitHub gonzalojparra
 * Emiliano Moreno Coppa: FAI 2844 - Tec. Des. Web - emiliano.moreno@est.fi.uncoma.edu.ar - GitHub Helsek
*/

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Módulo para cargar juegos que se desarrollaron 
 * @param void
 * @return array
 */
function cargarJuegos() {

    // array $juegos
    $juegos[0] = [ 
        'jugadorCruz' => 'EMILIANO',
        'jugadorCirculo' => 'AGUSTIN',
        'puntosCruz' => '5',
        'puntosCirculo' => '0',
    ];

    $juegos[1] = [ 
        'jugadorCruz' => 'GONZALO',
        'jugadorCirculo' => 'AGUSTIN',
        'puntosCruz' => '6',
        'puntosCirculo' => '0',
    ];

    $juegos[2] = [ 
        'jugadorCruz' => 'AGUSTIN',
        'jugadorCirculo' => 'EMILIANO',
        'puntosCruz' => '1',
        'puntosCirculo' => '1',
    ];

    $juegos[3] = [ 
        'jugadorCruz' => 'GONZALO',
        'jugadorCirculo' => 'AGUSTINA',
        'puntosCruz' => '2',
        'puntosCirculo' => '0',
    ];

    $juegos[4] = [ 
        'jugadorCruz' => 'AGUSTINA',
        'jugadorCirculo' => 'EMILIANO',
        'puntosCruz' => '5',
        'puntosCirculo' => '0',
    ];

    $juegos[5] = [ 
        'jugadorCruz' => 'AGUSTINA',
        'jugadorCirculo' => 'AGUSTIN',
        'puntosCruz' => '0',
        'puntosCirculo' => '3',
    ];

    $juegos[6] = [ 
        'jugadorCruz' => 'EMILIANA',
        'jugadorCirculo' => 'AGUSTIN',
        'puntosCruz' => '0',
        'puntosCirculo' => '5',
    ];

    $juegos[7] = [ 
        'jugadorCruz' => 'EMILIANO',
        'jugadorCirculo' => 'AGUSTIN',
        'puntosCruz' => '1',
        'puntosCirculo' => '1',
    ];

    $juegos[8] = [ 
        'jugadorCruz' => 'EMILIANA',
        'jugadorCirculo' => 'EMILIANO',
        'puntosCruz' => '0',
        'puntosCirculo' => '4',
    ];

    $juegos[9] = [ 
        'jugadorCruz' => 'EMILIANA',
        'jugadorCirculo' => 'GONZALO',
        'puntosCruz' => '1',
        'puntosCirculo' => '1',
    ];
    return $juegos;
}

/**
* Este módulo va a mostrar por pantalla al usuario el menú.
* @param void
* @return int
*/
function seleccionarOpcion() {
    
    // int $numero
    echo "MENU DEL JUEGO\n";
    echo "1) Jugar al tateti\n";
    echo "2) Mostrar un juego\n";
    echo "3) Mostrar el primer juego ganador\n";
    echo "4) Mostrar porcentaje de juegos ganados\n";
    echo "5) Mostrar resumen de jugador\n";
    echo "6) Mostrar listado de juegos ordenado por jugador O\n";
    echo "7) Salir\n";
    echo "Ingrese la opción en la que desea ingresar: ";
    $numero = solicitarNumeroEntre(1, 7);
    /*$numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= 1 && $numero <= 7)) {
        echo "¡Opción inválida! Debe ser un número entre el 1 y 7\n";
        echo "Vuelva a ingresar el número: ";
        $numero = trim(fgets(STDIN));
    }*/
    return $numero;	
}

/**
 * Este módulo le solicita al usuario un número entre dos valores y si el número es inválido lo pide de vuelta
 * @param int $valor1, $valor2
 * @return int
 */
function validarNumero ($valor1, $valor2) {

    // int $numeroIngresado
    do {
        echo "Ingrese un numero entre " .$valor1. " y " .$valor2. ": ";
        $numeroIngresado = trim(fgets(STDIN));
        if (!(($valor1 <= $numeroIngresado) && ($numeroIngresado <= $valor2))) {
            echo "El numero de juego no existe.\n";
        }
    } while (!(($valor1 <= $numeroIngresado) && ($numeroIngresado <= $valor2)));
    return $numeroIngresado;
}

/**
* Este módulo solicita un número y muestra datos del juego
* @param int $numeroDeJuego
* @param array $listaDeJuegos
* @return void
*/
function mostrarJuego ($numeroDeJuego, $listaDeJuegos) {

    if ($listaDeJuegos[$numeroDeJuego]['puntosCruz'] > $listaDeJuegos[$numeroDeJuego]['puntosCirculo']) {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó X)\n";
        echo "Jugador X: " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    } elseif ($listaDeJuegos[$numeroDeJuego]['puntosCirculo'] > $listaDeJuegos[$numeroDeJuego]['puntosCruz']) {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó O)\n";
        echo "Jugador X: " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    } else {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (empate)\n";
        echo "Jugador X: " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$listaDeJuegos[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    }
}

/**
* Módulo que modifica una colección agregando un juego nuevo 
* @param array $juegos
* @param array $unJuego
* @return array
*/
function agregarJuego($juegos, $unJuego) {

    // int $numArray
    $numArray = count($juegos);
    $juegos[$numArray] = $unJuego;
    return $juegos;
}

/**
 * Este módulo recibe una colección de juegos y el nombre de un jugador y devuelve el primer juego ganado
 * @param array $listaDeJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerJuegoGanado ($listaDeJuegos, $nombreJugador) {

    // int $i, $primerGanado
    // boolean $bandera
    $i = 0;
    $bandera = true;
    $primerGanado = -1;
    do {
        if ($nombreJugador == $listaDeJuegos[$i]['jugadorCruz'] && ($listaDeJuegos[$i]['puntosCruz'] > $listaDeJuegos[$i]['puntosCirculo'])) {
            $bandera = false;
            $primerGanado = $i;
        } elseif ($nombreJugador == $listaDeJuegos[$i]['jugadorCirculo'] && ($listaDeJuegos[$i]['puntosCirculo'] > $listaDeJuegos[$i]['puntosCruz'])){
            $bandera = false;
            $primerGanado = $i;
        }
        $i++;
    } while ($i < (count($listaDeJuegos)) && $bandera);
    return $primerGanado;
}

/**
 * Este módulo recibe una colección de juegos y el nombre de un jugador y retorna el resumen del jugador
 * @param array $listaDeJuegos
 * @param string $nombreJugadorResumen
 * @return array
 */
function resumenJugador ($listaDeJuegos, $nombreJugadorResumen) {

    // array $resumenDelJugador
    $resumenDelJugador = [
        "nombre" => "",
        "juegoGanado" => 0,
        "juegoPerdido" => 0,
        "juegoEmpatado" => 0,
        "puntoAcumulado" => 0 
    ];
    // string $nombreArray
    // int $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
    $nombreArray = "";
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcumulados = 0;
    for ($y = 0; $y < count($listaDeJuegos); $y++) {
        if ($listaDeJuegos[$y]['jugadorCruz'] == $nombreJugadorResumen) {
            $nombreArray = $nombreJugadorResumen;
            if ($listaDeJuegos[$y]['puntosCruz'] > $listaDeJuegos[$y]['puntosCirculo']) {
                $juegosGanados++;
            } elseif ($listaDeJuegos[$y]['puntosCruz'] == $listaDeJuegos[$y]['puntosCirculo']) {
                $juegosEmpatados++;
            } elseif ($listaDeJuegos[$y]['puntosCruz'] < $listaDeJuegos[$y]['puntosCirculo']) {
                $juegosPerdidos++;
            }
            $puntosAcumulados = $puntosAcumulados + $listaDeJuegos[$y]['puntosCruz'];
        } elseif ($listaDeJuegos[$y]['jugadorCirculo'] == $nombreJugadorResumen) {
            $nombreArray = $nombreJugadorResumen;
            if ($listaDeJuegos[$y]['puntosCirculo'] > $listaDeJuegos[$y]['puntosCruz']) {
                $juegosGanados++;
            } elseif ($listaDeJuegos[$y]['puntosCirculo'] == $listaDeJuegos[$y]['puntosCruz']) {
                $juegosEmpatados++;
            } elseif ($listaDeJuegos[$y]['puntosCirculo'] < $listaDeJuegos[$y]['puntosCruz']) {
                $juegosPerdidos++;
            }
            $puntosAcumulados = $puntosAcumulados + $listaDeJuegos[$y]['puntosCirculo'];
        }
    }
    $resumenDelJugador["nombre"] = $nombreArray;
    $resumenDelJugador["juegoGanado"] = $juegosGanados;
    $resumenDelJugador["juegoPerdido"] = $juegosPerdidos;
    $resumenDelJugador["juegoEmpatado"] = $juegosEmpatados;
    $resumenDelJugador["puntoAcumulado"] = $puntosAcumulados;

    return $resumenDelJugador;
}

/**
 * Este módulo muestra como cartel el resumen del jugador recibiendo el array de la función anterior (resumenJugador)
 * @param array $resumenDelJugador
 * @return void
 */
function mostrarResumen($resumenDelJugador) {

    echo "\n"; //Salto de línea para mayor legibilidad
    echo "******************************\n";
    echo "Jugador: " .$resumenDelJugador["nombre"]. "\n";
    echo "Ganó: " .$resumenDelJugador["juegoGanado"]. "\n";
    echo "Perdió: " .$resumenDelJugador["juegoPerdido"]. "\n";
    echo "Empató: " .$resumenDelJugador["juegoEmpatado"]. "\n";
    echo "Total de puntos acumulados: " .$resumenDelJugador["puntoAcumulado"]. "\n";
    echo "******************************\n";
    echo "\n"; //Salto de línea para mayor legibilidad
}

/**
 * Esta función pide al usuario ingresar un símbolo, obligatoriamente debe ser X/O
 * @param void
 * @return string
 */
function simboloXO () {

    // boolean $validacion
    // string $simbolo
    // La variable $validacion la inicializaremos en true para que cuando la condición nos de false salgamos del while con el resultado
    $validacion = true;
    echo "Ingrese un símbolo (debe ser X/O): ";
    $simbolo = trim(fgets(STDIN));
    // Aquí usaremos la función strtoupper en caso de que ingresen el símbolo en minúscula, para que se convierta en una mayúscula
    $simbolo = strtoupper($simbolo);
    while ($validacion) {
        if ($simbolo == "O") {
            $validacion = false;
        } elseif ($simbolo == "X") {
            $validacion = false;
        } else {
            echo "Ingrese un símbolo válido, ya sea X/O: ";
            $simbolo = trim(fgets(STDIN));
        }
    }
    return $simbolo;
}

/**
 * Esta función retorna la cantidad de juegos ganados según una colección de juegos
 * @param array $listaDeJuegos
 * @return int
 */
function cantJuegosGanados ($listaDeJuegos) {

    // int $cantidadDeJuegosGanados, $c
    $cantidadDeJuegosGanados = 0;
    for ($c = 0; $c < count($listaDeJuegos); $c++) {
        if ($listaDeJuegos[$c]['puntosCruz'] != 1 && $listaDeJuegos[$c]['puntosCirculo'] != 1) {
            $cantidadDeJuegosGanados++;
        }
    }
    return $cantidadDeJuegosGanados;
}

/**
 * Esta función recibe una colección de juegos y un símbolo y retorna la cantidad de juegos ganados según el símbolo
 * @param array $listaDeJuegos
 * @param string $simbol
 * @return int
 */
function ganadosSimbolo ($listaDeJuegos, $simbol) {
    
    // int $cantJuegosGanadosSimbolo (Contador), $g
    $cantJuegosGanadosSimbolo = 0;
    for ($g = 0; $g < count($listaDeJuegos); $g++) {
        if ($simbol == "X") {
            if ($listaDeJuegos[$g]['puntosCruz'] > 1) {
                $cantJuegosGanadosSimbolo++;
            }
        } elseif ($simbol == "O") {
            if ($listaDeJuegos[$g]['puntosCirculo'] > 1){
                $cantJuegosGanadosSimbolo++;
            }
        }
    } 
    return $cantJuegosGanadosSimbolo;
}

/**
 * Este módulo recibe dos string y los compara de menor a mayor, retorna -1 si ($a < $b), 1 si ($a > $b) y 0 si ambos son iguales
 * @param string $a, $b
 * @return int
 */
function ordenarJugadorCirculo ($a, $b) {

    // int ordJugadorO
    $ordJugadorO = strcmp($a['jugadorCirculo'], $b['jugadorCirculo']);
    return $ordJugadorO;
}

/**
 * Este módulo recibe una colección de juegos y los ordena alfabéticamente en base al jugador O
 * @param array $listaDeJuegos
 * @return void
 */
function juegosOrdenadosO ($listaDeJuegos) {

    uasort ($listaDeJuegos, 'ordenarJugadorCirculo');
    print_r ($listaDeJuegos);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/** Declaración de variables:
 * array $juegoNuevo, $listaDeJuegos
 * int $opcion, $numJuego, $valorUno, $valorDos, $numeroDeGanador, $cantidadGanadosSimbolo, $cantJuegos
 * string $jugadorGanador, $simboloJugador, $nombre
 * float $porcentajeGanados
*/

//Inicialización de variables:
//Se cargan los 10 juegos a la lista
$listaDeJuegos = cargarJuegos();

//Proceso:
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) { // Se utiliza switch, el cual es una estructura de control similar al if, sirve para comparar la misma variable con valores diferentes
        case 1: 
            // Jugar al tateti
            $juegoNuevo = jugar();
            imprimirResultado($juegoNuevo);
            // Almacenar juego en la base de datos
            $listaDeJuegos = agregarJuego($listaDeJuegos, $juegoNuevo);
            break;
        case 2:
            // Mostrar un juego
            if (count($listaDeJuegos) > 0) {
                $valor1 = 0;
                $valor2 = (count($listaDeJuegos) - 1);
                $numJuego = validarNumero($valor1, $valor2);
                // Mostrar el juego pedido
                mostrarJuego($numJuego, $listaDeJuegos);
            } else {
                echo "No se ha registrado ningún juego.\n";
            }
            break;
        case 3:
            // Mostrar el primer juego ganado
            if (count($listaDeJuegos) > 0) {
                echo "Ingrese el nombre del jugador a buscar: ";
                $jugadorGanador = trim(fgets(STDIN));
                $jugadorGanador = strtoupper($jugadorGanador);
                $numeroDeGanador = primerJuegoGanado($listaDeJuegos, $jugadorGanador);
                if ($numeroDeGanador >= 0) {
                    mostrarJuego($numeroDeGanador, $listaDeJuegos);
                } else {
                    echo "\n"; //Salto de línea para mayor legibilidad
                    echo "El jugador " .$jugadorGanador. " no ha ganado ningún juego.\n";
                    echo "\n"; //Salto de línea para mayor legibilidad
                }
            } else {
                echo "No se ha registrado ningún juego.\n";
            }
            break;
        case 4:
            // Mostrar porcentaje de juegos ganados
            $simboloJugador = simboloXO();
            $cantidadGanadosSimbolo = ganadosSimbolo($listaDeJuegos, $simboloJugador);
            $cantJuegos = cantJuegosGanados($listaDeJuegos);
            $porcentajeGanados = round(($cantidadGanadosSimbolo / $cantJuegos) * 100);
            echo "\n"; //Salto de línea para mayor legibilidad
            echo "El jugador " .$simboloJugador. " ganó el " .$porcentajeGanados. "% de juegos.\n";
            echo "\n"; //Salto de línea para mayor legibilidad
            break;
        case 5:
            // Mostrar resumen de un jugador
            echo "Ingrese el nombre del jugador: ";
            $nombre = trim(fgets(STDIN));
            $nombre = strtoupper($nombre);
            // Comprobamos si el jugador existe
            $flagR = true;
            $w = 0;
            do {
                if ($listaDeJuegos[$w]['jugadorCruz'] == $nombre) {
                    $flagR = false;
                } elseif ($listaDeJuegos[$w]['jugadorCirculo'] == $nombre) {
                    $flagR = false;
                }
                $w++;
            } while ($flagR && $w < count($listaDeJuegos));
            if ($flagR) {
                echo "\n"; //Salto de línea para mayor legibilidad
                echo "El jugador " .$nombre. " no ha realizado ningún juego.\n";
                echo "\n"; //Salto de línea para mayor legibilidad
            } else {
                mostrarResumen(resumenJugador($listaDeJuegos, $nombre));
            }
            break;
        case 6:
            // Mostrar listado de juegos ordenado por jugador O
            juegosOrdenadosO ($listaDeJuegos);
            break;
        case 7:
            // Muestra cartel de finalización de juego
            echo "TATETI FINALIZADO.";
    }
 } while ($opcion != 7);