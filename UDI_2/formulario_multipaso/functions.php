<?php
    //Listado de ejercicios
    $ejercicios = [
    [
        "nombre" => "Press de banca",
        "musculo" => "Pectorales",
        "tipo" => ["fuerza"],
        "equipamiento" => ["barra"],
        "nivel" => ["Principiante"],
        "repeticiones" => "6-8 reps",
        "series" => "3-4",
        "descanso" => "90 seg",
        "progresion" => "+2.5 kg por semana",
        "duracion" => "6 semanas"
    ],
    [
        "nombre" => "Sentadilla",
        "musculo" => "Piernas",
        "tipo" => ["fuerza", "hipertrofia", "resistencia"],
        "equipamiento" => ["barra", "mancuernas", "peso corporal"],
        "nivel" => ["Principiante", "Intermedio", "Avanzado"],
        "repeticiones" => "8-12 reps",
        "series" => "3-5",
        "descanso" => "60-180 seg",
        "progresion" => "+5 kg cada semana",
        "duracion" => "8 semanas"
    ]
];


    function nombreEjercicios($ejercicios){
        $arrayNombreEjercicios = [];
        foreach($ejercicios as $ejercicio){
            $arrayNombreEjercicios[] = $ejercicio["nombre"];
        }

        return $arrayNombreEjercicios;
    }



?>