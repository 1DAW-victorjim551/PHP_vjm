<?php
    session_start();
    // if (!isset($_SESSION['visitas'])) {
    //     $_SESSION['visitas'] = 0;
    // }
    // $_SESSION['visitas']++;
    // echo "Número de visitas en esta sesión: " . $_SESSION['visitas'];
     
    if (isset($_COOKIE['visita'])) {
        $visita = $_COOKIE['visita'];
        if($_COOKIE['visita'] == 10){
            setcookie('visita', $visita, time() + (-1));
        }else {
            $visita = $_COOKIE['visita'] + 1;
        setcookie('visita', $visita, time() + 3600);
        echo "Visita numero : " . "<b>$visita</b>";
        }
        
    }else {
        $visita = 1;
        setcookie('visita', $visita, time() + 3600);
        echo "Es tu primera visita";
    }
?>