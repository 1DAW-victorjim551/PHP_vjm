<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

    $rutaCSV = "./jugadores.csv";
    function leerArchivo($rutaCSV){
    $tabla = [];
    if (($puntero = fopen($rutaCSV, "r")) !== FALSE) {
        while (($filaCSV = fgetcsv($puntero)) !== FALSE) {
            $tabla[] = $filaCSV;
        }
        fclose($puntero);
    }
    return $tabla;
}

function mostrarJugadores($tabla){
    $output = "";
    $output .= "<div>";
    $output .= "<table border='1'>";
        foreach ($tabla as $fila){
            $output .= "<tr>";
            dump($fila);
            foreach ($fila as $celda){
                $output .= "<td>${celda}</td>";
            }
            
            $output .= "</tr>"; 
        }
        
        $output .= "</table>";
        $output .= "</div>";
   

    return $output;
}

$tabla = leerArchivo($rutaCSV);

$tablaMarkup = mostrarJugadores($tabla);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Jugadores</title>
</head>
<body>
    <?php echo $tablaMarkup ?>
</body>
</html>