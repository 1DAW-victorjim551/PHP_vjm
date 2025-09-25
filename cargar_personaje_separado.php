<?php

/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Zona de declaración de funciones */
//Funciones de debugueo
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

//Función lógica presentación
function getTableroMArkup ($tablero, $arrayRana){
    $output = '';
    $cont = 0;

    foreach ($tablero as $filaIndex => $datosFila) {
        foreach ($datosFila as $columnaIndex => $tileType) {
            $cont++;

            if (isset($arrayRana[$cont])) {
                $output .= '<div class="tile ' . $tileType . '">' . $arrayRana[$cont] . '</div>';
            } else {
                $output .= '<div class="tile ' . $tileType . '"></div>';
            }
        }
    }

    return $output;
}

//Lógica de negocio
//El tablero es un array bidimensional en el que cada fila contiene 12 palabras cuyos valores pueden ser:
// agua
//fuego
//tierra
// hierba

function generarPersonaje(){
    $random =  rand(0, 143);
    $rana = '<img src="./media/froggit.webp" style="width:20px;height:20px;display:inline-block">';
    $arrayRana = array(
        $random => $rana
    );
    return $arrayRana;
}
function leerArchivoCSV($archivoCSV) {
    $tablero = [];

    if (($puntero = fopen($archivoCSV, "r")) !== FALSE) {
        while (($datosFila = fgetcsv($puntero)) !== FALSE) {
            $tablero[] = $datosFila;
        }
        fclose($puntero);
    }

    return $tablero;
}

$tablero = leerArchivoCSV('media/divs_php.csv');
$arrayRana = generarPersonaje();

//Lógica de presentación
$tableroMarkup = getTableroMArkup($tablero, $arrayRana);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contenedorTablero {
            width: 600px;
            height: 600px;
            border-radius: 5px;
            border: solid 2px grey;
            box-shadow: grey;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: repeat(12, 1fr);
            display: grid; /* activa el sistema de cuadrícula (grid layout) para organizar las casillas */
        }
        .tile {
            width: 50px;
            height: 50px;
            float: left;
            margin: 0;
            padding: 0;
            border-width: 0;
            background-image: url('./media/464.jpg');
            background-size: 206px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .fuego {
            background-color: red;
            background-position: -103px -52px;
        }
        .tierra {
            background-color: brown;
        }
        .agua {
            background-color: blue;
        }
        .hierba {
            background-color: green;
        }
    </style>
</head>
<body>
    <h1>Tablero juego super rol DWES</h1>
    <div class="contenedorTablero">
        <?php echo $tableroMarkup; ?>
    </div>
</body>
</html>
