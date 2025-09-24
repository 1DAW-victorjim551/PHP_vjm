
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $Jefes = [
        "Victor" => ["Christian", "Aitor"], 
        "Vicente" => ["Patricia", "Nuria"], 
        "Jose" => ["Ines", "Celia"]
    ];

    $lista;
    function mostrarListaJefes($Jefes){
        $lista = "<ol>";
        foreach($Jefes as $jefe => $esbirro){
            $lista .= "<li>$jefe</li>";
    }
    
    $lista .= "</ol";

    return $lista;
    }
    
    $empleados = mostrarListaJefes($Jefes);
    
?>