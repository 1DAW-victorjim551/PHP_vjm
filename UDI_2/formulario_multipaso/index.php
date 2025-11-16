<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("./functions.php");
    $nombreEjercicios = nombreEjercicios($ejercicios);

    session_start();
?>
</head>
<body>
    

<form method="post" action="index.php">
    <label for="ejercicio">Selecciona un ejercicio:</label>
    <select name="ejercicio" id="ejercicio" required>
        <?php foreach ($nombreEjercicios as $ejercicio): ?>
            <option value="<?php echo $ejercicio; ?>">
                <?php echo $ejercicio; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Siguiente</button>
</form>

        <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ejercicio'])) {
                    $_SESSION['ejercicio'] = $_POST['ejercicio'];
                // Redirige o muestra el siguiente formulario
                echo "<form>"
}

        ?>

</body>
</html>