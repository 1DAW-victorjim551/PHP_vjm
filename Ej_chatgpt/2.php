<?php
    function generarTabla($fila, $columna){
        $output = "";

        $output .= "<table border='1'>";

        for ($i=0;$i<$fila;$i++){
            $output.= "<tr>";
            for ($j=0;$j<$columna;$j++){
                $output .= "<td>" . " "  . ($fila . " " . $columna);
                $output .= "</td>";
            }
            $output .= "</tr>";
        }

        $output .= "</table>";

        return $output;
    }
    $tablaMarkup = generarTabla(2, 3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $tablaMarkup; ?>
</body>
</html>
