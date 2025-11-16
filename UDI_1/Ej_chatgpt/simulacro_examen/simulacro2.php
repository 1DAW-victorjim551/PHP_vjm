<?php
#INICIALIZACIÓN DEL ENTORNO
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    /* Funciones de debug */
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

$filtro = $_GET['filtro']??""; 


 function leerCSV($rutaCSV) {
     $productos = [];
    if (($puntero = fopen($rutaCSV, "r")) !== FALSE) {
        while (($filaCSV = fgetcsv($puntero)) !== FALSE) {
            $productos[] = $filaCSV;
        }
        fclose($puntero);
    }
    return $productos;
}


    /* LÓGICA DE NEGOCIO */

    function generarTablaCompleta($productos){
        $output = "";

        $output = "<div>";
        $output .= "<table border='1'>";
            foreach ($productos as $fila){
               $output.= "<tr>";
                foreach ($fila as $celdas){
                    $output.= "<td>${celdas}</td>";
                }
               $output.= "</tr>";
            }
        $output .= "</table>";
        $output .= "</div>";

        return $output;
        
    }

    function generarTablaFiltrada($productosFiltrados){
        $output = "";

        $output = "<div>";
        $output .= "<table border='1'>";
            foreach ($productosFiltrados as $fila){
               $output.= "<tr>";
                foreach ($fila as $celdas){
                    $output.= "<td>${celdas}</td>";
                }
               $output.= "</tr>";
            }
        $output .= "</table>";
        $output .= "</div>";

        return $output;
        
    }

    function filtrarPor($producto, $filtro){
        $productosFiltrados = [];
        foreach ($producto as $fila){
            if(isset($producto) && $fila[3]==$filtro){
                $productosFiltrados[] = $fila;
            }
        }

        return $productosFiltrados;
    }


    /* LÓGICA DE PRESENTACIÓN */
    $productos = leerCSV("./productos.csv") ;
    $productosFiltrados = filtrarPor($productos, $filtro);
    $tablaCompletaMarkup = generarTablaCompleta($productos);
    $tablaFiltradaMarkup = generarTablaFiltrada($productosFiltrados);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro Examen PHP UDI 1</title>
</head>
<body>
    <h1>Tabla Completa</h1>
    <?php echo $tablaCompletaMarkup?>
    <br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="filtro">Filtrar por:</label>
        <select id="filtro" name="filtro">
            <option value="">--Selecciona--</option>
            <option value="Ropa" <?php if($filtro=="Ropa") echo "selected"; ?>>Ropa</option>
            <option value="Electrónica" <?php if($filtro=="Electrónica") echo "selected"; ?>>Electrónica</option>
            <option value="Hogar" <?php if($filtro=="Hogar") echo "selected"; ?>>Hogar</option>
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