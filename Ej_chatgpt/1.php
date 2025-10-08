<?php
    function generarLista($numero){
        $output = "";
        $output .= "<div>";
        $output .= "<ul>";
        for ($i=0; $i<$numero; $i++){
           $output .= "<li>Elemento $numero</li>"; 
        }
        $output .= "</ul>";
        $output .= "</div>";

        return $output;
    }


    $listaMarkup = generarLista(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php echo $listaMarkup ?>
</body>
</html>