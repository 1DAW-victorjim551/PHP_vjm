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

$cont = 0;
$random = 0;
$rana = "";

//Función lógica presentación
function getTableroMArkup ($tablero, $arrayRana){
    $output = '';
    //dump($tablero);
    foreach ($tablero as $filaIndex => $datosFila) {
        foreach ($datosFila as $columnaIndex => $tileType) {
            //dump($tileType);
            $cont++;
            if ($cont == $arrayRana[0 => $random]){
                $output .= '<div class = "tile ' . $tileType . '">'. $arrayRana[0 => $rana] .' </div>';
            }else{
                $output .= '<div class = "tile ' . $tileType . '"></div>';
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

function generarPersonaje($cont, $random, $rana){
    $cont = 0;
    $random =  rand(0, 143);
    $rana = '<img src="./media/froggit.webp" style = "width: 20px, height: 20px, display: inline-block">';
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

//Lógica de presentación
$tableroMarkup = getTableroMArkup($tablero, $cont, $random, $rana);


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
        }
        .tile {
            width: 50px;
            height: 50px;
            float: left;
            margin: 0;
            padding: 0;
            border-width: 0;
            background-image: url('./media/464.jpg');
            background-size: 206px


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