<?php
    $preguntas = array("¿Cual es la capital de España?", "¿Quien fue el presidente de Alemania en 1942?", "¿Cuanto son 5*6?");
    function generarPreguntas($preguntas){
        $output = "";
        foreach ($preguntas as $indice => $pregunta){
        $output .= "<div id='pregunta_" . $indice . "' class='preguntas'>";
        $output .= "<p>$pregunta</p>";
        $output .= "</div>";
        }

        return $output;
    }

    $preguntasMarkup = generarPreguntas($preguntas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $preguntasMarkup ?>;
</body>
</html>