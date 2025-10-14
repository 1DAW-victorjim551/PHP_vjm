<?php
    $ciudades = array(
        "Huelva" => 26,
        "Sevilla" => 32,
        "Bilbao" => 20,
        "Malaga" => 27
    );


    function generarTabla($ciudades){
        $temperatura = "";
        foreach ($ciudades as $ciudad => $grados){
            if ($grados > 30){
                $temperatura = "style='background:red'";
            }elseif ($grados < 15){
                $temperatura = "style='background:blue'";
            }else {
                $temperatura = "style='background:green'";
            }
        }
        
        $output = "";
        $output = "<div>";
        $output .= "<table border='1'>";
        foreach($ciudades as $ciudad => $grados){
            $output .= "<tr>";
            $output .= "<td>${ciudad}</td>";
            $output .= "<td ${temperatura}>${grados}</td>";
            $output .= "</tr>";
        }

        return $output;
    }

    $tablaMarkup = generarTabla($ciudades);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $tablaMarkup?>;
</body>
</html>