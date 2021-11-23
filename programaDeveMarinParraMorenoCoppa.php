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

//print_r (count($juegos));
//array_push($juegos);
//strval(count($juegos))

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
    echo "4) Mostrar porcentaje de Juegos ganados\n";
    echo "5) Mostrar resumen de Jugador\n";
    echo "6) Mostrar listado de juegos ordenado por jugador O\n";
    echo "7) Salir\n";
    echo "Ingrese la opción en la que desea ingresar: ";
    $numero = trim(fgets(STDIN));
    if (is_string($numero) && !($numero >= 1 && $numero <= 7)) {
        echo "¡Opción inválida! Debe ser un número entre el 1 y 7\n";
        echo "Vuelva a ingresar el número: ";
        $numero = trim(fgets(STDIN));
    }
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
* @param array $seleccionJuego
* @return void
*/
function mostrarJuego ($numeroDeJuego, $seleccionJuego) {

    /*echo "Ingrese el número de juego que desea visualizar: ";
    $numeroDeJuego=trim(fgets(STDIN));
    while (!($numeroDeJuego >= 0 && $numeroDeJuego <= 9)) {
        echo "El número es invalido, debe ser un número entre el 0 y 9\n";
        echo "Vuelva a ingresar un número: ";
        $numeroDeJuego = trim(fgets(STDIN));
    }*/

    if ($seleccionJuego[$numeroDeJuego]['puntosCruz'] > $seleccionJuego[$numeroDeJuego]['puntosCirculo']) {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó X)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    } elseif ($seleccionJuego[$numeroDeJuego]['puntosCirculo'] > $seleccionJuego[$numeroDeJuego]['puntosCruz']) {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó O)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    } else {
        echo "\n"; //Salto de línea para mayor legibilidad
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (empate)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCruz']. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " obtuvo " .$seleccionJuego[$numeroDeJuego]['puntosCirculo']. " puntos \n";
        echo "******************************\n";
        echo "\n"; //Salto de línea para mayor legibilidad
    }
}

/**
* Módulo que modifica una colección agregando un juego nuevo 
* @param array $coleccionDeJuegos
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
 * @param array $coleccionJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerJuegoGanado ($coleccionJuegos, $nombreJugador) {

    // int $i, $primerGanado
    // boolean $bandera
    $i = 0;
    $bandera = false;
    $primerGanado = -1;
    do {
        if ($nombreJugador == $coleccionJuegos[$i]['jugadorCruz'] && ($coleccionJuegos[$i]['puntosCruz'] > $coleccionJuegos[$i]['puntosCirculo'])) {
            $bandera = true;
            $primerGanado = $i;
        } elseif ($nombreJugador == $coleccionJuegos[$i]['jugadorCirculo'] && ($coleccionJuegos[$i]['puntosCirculo'] > $coleccionJuegos[$i]['puntosCruz'])){
            $bandera = true;
            $primerGanado = $i;
        }
        $i++;
    } while ($i < (count($coleccionJuegos)) && !$bandera);
    return $primerGanado;
}

/**
 * Este módulo recibe una colección de juegos y el nombre de un jugador y retorna el resumen del jugador
 * @param array $listadoDeJuegos
 * @param string $nombreJugadorResumen
 * @return array
 */
function resumenJugador ($listadoDeJuegos, $nombreJugadorResumen) {

    // array $resumenDelJugador
    $resumenDelJugador = [
        "nombre" => "",
        "juegoGanado" => 0,
        "juegoPerdido" => 0,
        "juegoEmpatado" => 0,
        "puntoAcumulado" => 0 
    ];
    // string $nombre
    // int $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
    $nombre = "";
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcumulados = 0;
    for ($y = 0; $y < count($listadoDeJuegos); $y++) {
        if ($listadoDeJuegos[$y]['jugadorCruz'] == $nombreJugadorResumen) {
            if ($listadoDeJuegos[$y]['puntosCruz'] > $listadoDeJuegos[$y]['puntosCirculo']) {
                $juegosGanados++;
            } elseif ($listadoDeJuegos[$y]['puntosCruz'] == $listadoDeJuegos[$y]['puntosCirculo']) {
                $juegosEmpatados++;
            } elseif ($listadoDeJuegos[$y]['puntosCruz'] < $listadoDeJuegos[$y]['puntosCirculo']) {
                $juegosPerdidos++;
            }
            $puntosAcumulados = $puntosAcumulados + $listadoDeJuegos[$y]['puntosCruz'];
        } elseif ($listadoDeJuegos[$y]['jugadorCirculo'] == $nombreJugadorResumen) {
            if ($listadoDeJuegos[$y]['puntosCirculo'] > $listadoDeJuegos[$y]['puntosCruz']) {
                $juegosGanados++;
            } elseif ($listadoDeJuegos[$y]['puntosCirculo'] == $listadoDeJuegos[$y]['puntosCruz']) {
                $juegosEmpatados++;
            } elseif ($listadoDeJuegos[$y]['puntosCirculo'] < $listadoDeJuegos[$y]['puntosCruz']) {
                $juegosPerdidos++;
            }
            $puntosAcumulados = $puntosAcumulados + $listadoDeJuegos[$y]['puntosCirculo'];
        }
    }
    $resumenDelJugador["nombre"] = $nombre;
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
function mostarResumen($resumenDelJugador) {

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
    // La variable $validacion la inicializaremos en true para que cuando la condición nos de falso salgamos del while con el resultado
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
 * @param array $juegosDelTateti
 * @return int
 */
function cantJuegosGanados ($juegosDelTateti) {

    // int $cantidadDeJuegosGanados
    $cantidadDeJuegosGanados = 0;
    for ($c = 0; $c < count($juegosDelTateti); $c++) {
        if ($juegosDelTateti[$c]["puntosCruz"] != 1 && $juegosDelTateti[$c]["puntosCirculo"] != 1) {
            $cantidadDeJuegosGanados++;
        }
    }
    return $cantidadDeJuegosGanados;
}







/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/** Declaración de variables:
 * array $juegoNuevo, $listaDeJuegos
 * int $opcion, $numJuego, $valorUno, $valorDos, $numeroDeGanador
 * string $jugadorGanador
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
                $valorUno = 0;
                $valorDos = (count($listaDeJuegos) - 1);
                $numJuego = validarNumero($valorUno, $valorDos);
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
        case 7:
            // Muestra cartel de finalización de juego
            echo "TATETI FINALIZADO.";
    }
 } while ($opcion != 7);