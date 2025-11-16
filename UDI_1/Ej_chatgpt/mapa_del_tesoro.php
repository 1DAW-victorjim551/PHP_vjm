<?php
#INICIALIZACIÓN DEL ENTORNO
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Funciones de debug */
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

#LÓGICA DE NEGOCIO
$fila = $_GET['fila'] ?? 0;
$columna = $_GET['columna'] ?? 0;

function leerCSV($rutaCSV){
    $mapa = [];
    if (($puntero = fopen($rutaCSV, "r")) !== FALSE) {
        while (($filaCSV = fgetcsv($puntero)) !== FALSE) {
            $mapa[] = $filaCSV;
        }
        fclose($puntero);
    }
    return $mapa;
}

function generarTablero($mapa, $arrayPersonaje){
    $output = '<div class="contenedorTablero">';
    $cont = 0;

    foreach ($mapa as $filaIndex => $datosFila) {
        foreach ($datosFila as $columnaIndex => $tileType) {
            $cont++;
            $contenido = '';

            // Si hay personaje en esta posición
            if (isset($arrayPersonaje[$cont])) {
                $contenido = $arrayPersonaje[$cont];
            } 
            // Si es tesoro y no está el personaje
            elseif ($tileType == 'tesoro') {
                $contenido = '<img src="./tesoro.png" style="width:20px;height:20px;">';
            }

            $output .= '<div class="tile ' . $tileType . '">' . $contenido . '</div>';
        }
    }

    $output .= '</div>';
    return $output;
}

function generarPersonaje(){
    global $fila, $columna;
    $posicion = ($fila * 5) + $columna + 1; // +1 para contar desde 1
    $personaje = '<img src="./pirata.png" style="width:20px;height:20px;display:inline-block">';
    $arrayPersonaje = array(
        $posicion => $personaje
    );

    return $arrayPersonaje;
}

/* Función para generar los botones */
function botonesMarkup($columna, $fila){
    $boton = array(
        "izquierda" => array($fila, $columna - 1),
        "derecha" => array($fila, $columna + 1),
        "arriba" => array($fila - 1, $columna),
        "abajo" => array($fila + 1, $columna)  
    );

    $markup = '<div class="botones">';
    foreach ($boton as $dir => $pos) {
        list($f, $c) = $pos;
        $markup .= '<a href="./index.php?fila='.$f.'&columna='.$c.'">'.$dir.'</a> ';
    }
    $markup .= '</div>';

    return $markup;
}

#LÓGICA DE PRESENTACIÓN
$mapa = leerCSV("./mapa_del_tesoro.csv");

/* Generación del personaje */
$arrayPersonaje = generarPersonaje();

/* Generación del markup del tablero */
$tableroMarkup = generarTablero($mapa, $arrayPersonaje);

/* Generación de botones */
$botones = botonesMarkup($columna, $fila);

/* Comprobar si el personaje ha llegado al tesoro */
if (isset($mapa[$fila][$columna]) && $mapa[$fila][$columna] === 'tesoro') {
    echo "<h2>¡Has encontrado el tesoro!</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa del Tesoro</title>
    <style>
    .contenedorTablero {
        width: 500px;
        height: 500px;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(5, 1fr);
        border: 2px solid grey;
        gap: 2px;
    }

    .tile {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .mar { background-color: blue; }
    .isla { background-color: #C2B280; }
    .tesoro { background-color: yellow; }
    .bosque { background-color: green; }

    .botones a {
        margin: 5px;
        padding: 5px 10px;
        background: #ccc;
        text-decoration: none;
        color: black;
        border-radius: 3px;
        display: inline-block;
    }
    </style>
</head>
<body>
    <?php echo $tableroMarkup ?>
    <?php echo $botones; ?>
</body>
</html>
