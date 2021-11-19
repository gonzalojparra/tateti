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

    //array $juegos
    $juegos[0] = [ 
        'jugadorCruz' => 'Emiliano',
        'jugadorCirculo' => 'Agustin',
        'puntosCruz' => '5',
        'puntosCirculo' => '0',
    ];

    $juegos[1] = [ 
        'jugadorCruz' => 'Gonzalo',
        'jugadorCirculo' => 'Agustin',
        'puntosCruz' => '6',
        'puntosCirculo' => '0',
    ];

    $juegos[2] = [ 
        'jugadorCruz' => 'Agustin',
        'jugadorCirculo' => 'Emiliano',
        'puntosCruz' => '1',
        'puntosCirculo' => '1',
    ];

    $juegos[3] = [ 
        'jugadorCruz' => 'Gonzalo',
        'jugadorCirculo' => 'Agustina',
        'puntosCruz' => '2',
        'puntosCirculo' => '0',
    ];

    $juegos[4] = [ 
        'jugadorCruz' => 'Agustina',
        'jugadorCirculo' => 'Emiliano',
        'puntosCruz' => '5',
        'puntosCirculo' => '0',
    ];

    $juegos[5] = [ 
        'jugadorCruz' => 'Agustina',
        'jugadorCirculo' => 'Agustin',
        'puntosCruz' => '0',
        'puntosCirculo' => '3',
    ];

    $juegos[6] = [ 
        'jugadorCruz' => 'Emiliana',
        'jugadorCirculo' => 'Agustin',
        'puntosCruz' => '0',
        'puntosCirculo' => '5',
    ];

    $juegos[7] = [ 
        'jugadorCruz' => 'Emiliano',
        'jugadorCirculo' => 'Agustin',
        'puntosCruz' => '1',
        'puntosCirculo' => '1',
    ];

    $juegos[8] = [ 
        'jugadorCruz' => 'Emiliana',
        'jugadorCirculo' => 'Emiliano',
        'puntosCruz' => '0',
        'puntosCirculo' => '4',
    ];

    $juegos[9] = [ 
        'jugadorCruz' => 'Emiliana',
        'jugadorCirculo' => 'Gonzalo',
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
    
    echo "MENU DEL JUEGO\n";
    echo "1) Jugar al tateti\n";
    echo "2) Mostrar un juego\n";
    echo "3) Mostrar el primer juego ganador\n";
    echo "4) Mostrar porcentaje de Juegos ganados\n";
    echo "5) Mostrar resumen de Jugador\n";
    echo "6) Mostrar listado de juegos ordenado por jugador O\n";
    echo "7) Salir\n";
    echo "Ingrese la opción en la que desea ingresar: \n";
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

    if ($seleccionJuego[$numeroDeJuego]["puntosCruz"] > $seleccionJuego[$numeroDeJuego]["puntosCirculo"]) {
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó X)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " puntos \n";
        echo "******************************\n";
    } elseif ($seleccionJuego[$numeroDeJuego]["puntosCirculo"] > $seleccionJuego[$numeroDeJuego]["puntosCruz"]) {
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (ganó O)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " puntos \n";
        echo "******************************\n";
    } else {
        echo "******************************\n";
        echo "Juego TATETI: " .$numeroDeJuego. " (empate)\n";
        echo "Jugador X: " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCruz"]. " puntos \n";
        echo "Jugador O: " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " obtuvo " .$seleccionJuego[$numeroDeJuego]["puntosCirculo"]. " puntos \n";
        echo "******************************\n";
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


//$a = mostrarJuego(2, 5);
//echo "" .$a;







/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:

//Se cargan los 10 juegos a la lista
$listaDeJuegos = cargarJuegos();

//Proceso:
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            //Jugar al tateti
            $juegoNuevo = jugar();
            imprimirResultado($juegoNuevo);
            //Almacenar juego en la base de datos
            $listaDeJuegos = agregarJuego($listaDeJuegos, $juegoNuevo);
            break;
        case 2:
            //Mostrar un juego
            if (count($listaDeJuegos) > 0) {
                $valorUno = 0;
                $valorDos = (count($listaDeJuegos)-1);
                $numJuego = validarNumero($valorUno, $valorDos);
                //Mostrar el juego pedido
                mostrarJuego($numJuego, $listaDeJuegos);
            } else {
                echo "No hay ningún juego registrado.\n";
            }
            break;
        case 3:
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
            break;
        case 7:
            //Muestra cartel de finalización de juego
            echo "Juego finalizado.";
    }
 } while ($opcion != 7);

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);