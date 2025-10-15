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

$filtro = $_GET['filtro']??"";

function leerCSV($rutaCSV){
     $empleados = [];
    if (($puntero = fopen($rutaCSV, "r")) !== FALSE) {
        while (($filaCSV = fgetcsv($puntero)) !== FALSE) {
            $empleados[] = $filaCSV;
        }
        fclose($puntero);
    }
    return $empleados;
}

function generarTabla($empleados){
    $output = "";
    $output = "<div>";
    $output .= "<table border='1'>";
    foreach ($empleados as $fila){
        $output .= "<tr>";
            foreach($fila as $celda){
                $output .= "<td>${celda}</td>";
            }
        $output .= "</tr>";
    }
    $output .= "</table>";
    $output .= "</div>";
    return $output;
}

function filtrarPor($empleados, $filtro){
    $tablaFiltrada = [];
    foreach ($empleados as $filas){
        if(isset($filas[2]) && $filas[2]==$filtro){
            $tablaFiltrada[] = $filas;
        }
    }

    return $tablaFiltrada;
}

#LÓGICA DE PRESENTACIÓN
$empleados = leerCSV("./empleados.csv");
$tablaMarkup = generarTabla($empleados);
$tablaFiltrada = filtrarPor($empleados, $filtro);
$tablaFiltradaMarkup = generarTabla($tablaFiltrada);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro 3 PHP</title>
</head>
<body>
    <?php echo $tablaMarkup ?>

    <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="filtro">Filtrar por:</label>
        <select id="filtro" name="filtro">
            <option value="">--Selecciona--</option>
            <option value="Marketing" <?php if($filtro=="Marketing") echo "selected"; ?>>Marketing</option>
            <option value="IT" <?php if($filtro=="IT") echo "selected"; ?>>IT</option>
            <option value="Recursos Humanos" <?php if($filtro=="Recursos Humanos") echo "selected"; ?>>Recursos Humanos</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <?php
    if ($filtro != "") {
        echo "<h2>Has seleccionado filtrar por: <strong>$filtro</strong></h2>";
    }
    ?>

    <?php echo $tablaFiltradaMarkup ?>
</body>
</html>