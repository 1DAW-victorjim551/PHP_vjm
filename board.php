<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $arrayImagenes = array("<img src='media/roca.png'>", "<img src='media/hielo.png'>", "<img src='media/piedra.png'>", "<img src='media/metal.png'>");
    $output = "";
    $indice=0;

function getBoard($arrayImagenes, $output, $indice){
        $output .= "<table border='1'>";
   
    for ($fila = 0; $fila < 12; $fila++) {
        $output .= "<tr>";
        for ($col = 0; $col < 12; $col++) {
             
            if ($indice > 3){
                $indice = 0;
            }
            $output .= "<td>$arrayImagenes[$indice]</td>";
            $indice++;
        }
        $output .= "</tr>";
    }

    $output .= "</table>";
    return $output;

}

$generarTablero = getBoard($arrayImagenes, $output, $indice);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
</head>
<body>
    <?php echo $generarTablero; ?>
</tr>
</table>
</body>
</html>