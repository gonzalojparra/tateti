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

/** Módulo para cargar juegos que se desarrollaron 
 * @param void
 * @return array
 */
function cargarJuegos() {

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
    echo "Elija la opción a la que desea ingresar: ";
    $numero = trim(fgets(STDIN));
    while (!($numero >= 1 && $numero <= 7)) {
        echo "El numero es invalido, debe ser un número entre el 1 y el 7\n";
        echo "Vuelva a ingresar un número: ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;	
}

/**
* Este módulo solicita un número y muestra datos del juego
* @param array $seleccionJuego
* @return void
*/
function mostrarJuego ($seleccionJuego) {
    //int $numeroDeJuego
    echo "Ingrese el número de juego que desea visualizar: ";
    $numeroDeJuego=trim(fgets(STDIN));
    while (!($numeroDeJuego >= 0 && $numeroDeJuego <= 9)){
        echo "El numero es invalido, debe ser un número entre el 0 y el 9\n";
        echo "Vuelva a ingresar un número\n";
        $numeroDeJuego = trim(fgets(STDIN));
    }

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

$a = mostrarJuego(5);
echo "" .$a;







/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/* 
do {
   $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break; (por cada case debe existir un break)
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/