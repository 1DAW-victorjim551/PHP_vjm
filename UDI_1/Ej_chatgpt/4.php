<?php
    $output = "";
    $enlaces = array(
        "Inicio" => "index.php",
        "Productos" => "productos.php",
        "Contacto" => "contacto.php"
    );

    function generarMenu($enlaces){
        $ouput = "<div class='menuPHP'>";
        $output .= "<ul>";
            foreach($enlaces as $clave => $url){
                $output .= "<li><a href='${url}'>${clave}</a></li>";
            }
        $output .= "</ul>";
        $output .= "</div>";
    }

    $enlacesMarkup = generarMenu($enlaces);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php $enlacesMarkup ?>;
</body>
</html>