<?php
$nombre = "";
if (isset($nombre)){
  $nombre = $_GET["nombre"];
}else {
  $nombre = "";
}
$edad = "";
if (isset($edad)){
  $edad = $_GET["edad"];
}else {
  $nombre = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario con GET</title>
</head>
<body>
  <h2>Formulario de nombre y edad</h2>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
    <br><br>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" value="<?php echo htmlspecialchars($edad); ?>">
    <br><br>

    <input type="submit" value="Enviar">
  </form>

  <?php if ($nombre && $edad): ?>
    <h3>Resultado:</h3>
    <p>Hola, <?php echo htmlspecialchars($nombre); ?>!</p>
    <p>Tienes <?php echo htmlspecialchars($edad); ?> años.</p>
  <?php endif ?>
</body>
</html>
