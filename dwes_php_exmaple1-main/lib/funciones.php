<?php
function dump($var){
    global $miVariable;
    echo $miVariable;
    echo '<pre>' . print_r($var, true) . '</pre>';
}

function getTableroMarkup($tablero, $posPersonaje){
    $output = '';
    foreach ($tablero as $filaIndex => $datosFila) {
        foreach ($datosFila as $columnaIndex => $tileType) {
            if (isset($posPersonaje) && $filaIndex == $posPersonaje['row'] && $columnaIndex == $posPersonaje['col']) {
                $output .= '<div class="tile ' . $tileType . '"><img src="./src/super_musculitos.png" alt="Personaje"></div>';
            } else {
                $output .= '<div class="tile ' . $tileType . '"></div>';
            }
        }
    }
    return $output;
}

function getMensajesMarkup($arrayMensajes){
    $output = '';
    foreach ($arrayMensajes as $mensaje){
        $output .= '<p>' . htmlspecialchars($mensaje) . '</p>';
    }
    return $output;
}

function getArrowsMarkup($arrows){
    $output = '';
    $output .= "<div class='formulario_arrows'>";
    if (isset($arrows)) {
        foreach ($arrows as $sentido => $arrayPos) {
            $output .= "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
            $output .= '<input type="hidden" name = "col" value="' . $arrayPos['col'] . '">';
            $output .= '<input type="hidden" name = "row" value="' . $arrayPos['row'] . '">';
            $output .= '<input type="submit" value="' . $sentido . '">' . $sentido . '</input>';
        }
    }
    $output .= "</form>";
    $output .= "</div>";
    return $output;
}

function leerArchivoCSV($rutaArchivoCSV) {
    $tablero = [];
    if (($puntero = fopen($rutaArchivoCSV, "r")) !== FALSE) {
        while (($datosFila = fgetcsv($puntero)) !== FALSE) {
            $tablero[] = $datosFila;
        }
        fclose($puntero);
    }
    return $tablero;
}

// function procesaRedirect(){
//     if (!isset($_GET['col']) && !isset($_GET['row'])) {
//         header("HTTP/1.1 308 Permanent Redirect");
//         header('Location: ./index.php?row=0&col=0');
//         exit;
//     }
// }

function leerInput(){
    $col = filter_input(INPUT_POST, 'col', FILTER_VALIDATE_INT);
    $row = filter_input(INPUT_POST, 'row', FILTER_VALIDATE_INT);
    return (isset($col) && is_int($col) && isset($row) && is_int($row)) ? array(
        'row' => $row,
        'col' => $col
    ) : null;
}

function getMensajes(&$posPersonaje){
    if (!isset($posPersonaje)) {
        return array('La posición del personaje no está bien definida');
    }
    return array('');
}

function getArrows($posPersonaje){
    if (isset($posPersonaje)) {
        return array(
            'izquierda' => array(
                'row' => $posPersonaje['row'],
                'col' => $posPersonaje['col'] - 1,
            ),
            'arriba' => array(
                'row' => $posPersonaje['row'] - 1,
                'col' => $posPersonaje['col'],
            ),
            'derecha' => array(
                'row' => $posPersonaje['row'],
                'col' => $posPersonaje['col'] + 1,
            ),
            'abajo' => array(
                'row' => $posPersonaje['row'] + 1,
                'col' => $posPersonaje['col'],
            ),
        );
    }
    return null;
}
