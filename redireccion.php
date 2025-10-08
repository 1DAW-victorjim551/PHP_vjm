<?php

/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Funciones de debug */
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}


/* Función para pintar el tablero con la rana */
function getTableroMArkup($tablero, $arrayRana){
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


function generarPersonaje(){
    global $fila, $columna;
    $random = ($columna * 12) + $fila;
    $rana = '<img src="./media/froggit.webp" style="width:20px;height:20px;display:inline-block">';
    $arrayRana = array(
        $random => $rana
    );

    return $arrayRana;
}

function procesarRedirect(){
    if(!isset($_GET='[columna]') || !isset($_GET='[fila]')){
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: ./index.php?columna=0&fila=0");
        die();
    }
}

/* Función para generar los botones */
function botonesMarkup($columna, $fila){
    $boton = array(
      "izquierda" => array(
        $columna,
        $fila - 1
      ),
      "derecha" => array(
        $columna,
        $fila + 1
      ),
      "arriba" => array(
        $columna - 1,
        $fila
      ),
      "abajo" => array(
        $columna + 1,
        $fila
      )  
    );

    $markup = '<div class="botones">';
    foreach ($boton as $dir => $pos) {
        list($c, $f) = $pos;
        $markup .= '<a href="./index.php?columna='.$c.'&fila='.$f.'">'.$dir.'</a> ';
    }
    dump($columna);
    dump($fila);
    $markup .= '</div>';

    return $markup;
}

/* Función para leer el CSV del tablero */
function leerArchivoCSV($archivoCSV){
    $tablero = [];
    if (($puntero = fopen($archivoCSV, "r")) !== FALSE) {
        while (($filaCSV = fgetcsv($puntero)) !== FALSE) {
            $tablero[] = $filaCSV;
        }
        fclose($puntero);
    }
    return $tablero;
}

/* Valores de fila y columna desde GET */
$fila = $_GET['fila'] ?? null;
$columna = $_GET['columna'] ?? null;

procesarRedirect();
/* Lectura del tablero */
$tablero = leerArchivoCSV('media/divs_php.csv');

/* Generación de la rana */
$arrayRana = generarPersonaje();

/* Generación del markup del tablero */
$tableroMarkup = getTableroMArkup($tablero, $arrayRana);

/* Generación de botones */
$botones = botonesMarkup($columna, $fila);


?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tablero Juego Super Rol DWES</title>
<style>
    .contenedorTablero {
        width: 600px;
        height: 600px;
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-template-rows: repeat(12, 1fr);
        border: 2px solid grey;
    }
    .tile {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc;
    }
    .fuego { background-color: red; }
    .tierra { background-color: brown; }
    .agua { background-color: blue; }
    .hierba { background-color: green; }
    .botones a {
        margin: 5px;
        padding: 5px 10px;
        background: #ccc;
        text-decoration: none;
        color: black;
        border-radius: 3px;
    }
</style>
</head>
<body>
<h1>Tablero Juego Super Rol DWES</h1>

<div class="contenedorTablero">
    <?php echo $tableroMarkup; ?>
</div>

<?php echo $botones; ?>

</body>
</html>
