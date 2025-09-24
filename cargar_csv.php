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

$archivo = fopen("divs_php.csv", "r");
$output;
//Función lógica presentación
function getFile($archivo, $output){
   // return fgetcsv(
     //     resource $stream,
   // ?int $length = null,
  //  string $separator = ",",
  //  string $enclosure = "\"",
  //  string $escape = "\\"
//): array|false
$lineas = [];
if ($archivo !== false) {
    while (($fila = fgetcsv($archivo, 1000, ",")) !== false) {
        $lineas[] = $fila; // guardamos cada fila en el array
    }
    fclose($archivo);

}

foreach ($lineas as $filas){
    $output .= $filas + " | ";
}

return $output;
}



$leerArchivo = getFile($archivo, $output);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Minified version -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    
</head>
<body>
    <h1>Tablero juego super rol DWES</h1>
    <div >
        <?php echo $leerArchivo; ?>
    </div>
</body>
</html>