<?php
$nombre = "";
if (isset($_GET["nombre"])) {
  $nombre = $_GET["nombre"];
} else {
  $nombre = "";
}

$edad = "";
if (isset($_GET["edad"])) {
  $edad = $_GET["edad"];
} else {
  $edad = "";
}

$genero = "";
if (isset($_GET["genero"])) {
  $genero = $_GET["genero"];
} else {
  $genero = "";
}

$pais = "";
if (isset($_GET["pais"])) {
  $pais = $_GET["pais"];
} else {
  $pais = "";
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

    <label>Género:</label>
    <input type="radio" id="masculino" name="genero" value="Masculino" <?php if($genero=="Masculino") echo "checked"; ?>>
    <label for="masculino">Masculino</label>

    <input type="radio" id="femenino" name="genero" value="Femenino" <?php if($genero=="Femenino") echo "checked"; ?>>
    <label for="femenino">Femenino</label>

    <input type="radio" id="otro" name="genero" value="Otro" <?php if($genero=="Otro") echo "checked"; ?>>
    <label for="otro">Otro</label>
    <br><br>

    <label for="pais">País:</label>
    <select id="pais" name="pais">
      <option value="">--Selecciona--</option>
      <option value="España" <?php if($pais=="España") echo "selected"; ?>>España</option>
      <option value="México" <?php if($pais=="México") echo "selected"; ?>>México</option>
      <option value="Argentina" <?php if($pais=="Argentina") echo "selected"; ?>>Argentina</option>
      <option value="Chile" <?php if($pais=="Chile") echo "selected"; ?>>Chile</option>
    </select>
    <br><br>

    <input type="submit" value="Enviar">
  </form>

  <?php if ($nombre && $edad && $genero && $pais): ?>
    <h3>Resultado:</h3>
    <p>Hola, <?php echo htmlspecialchars($nombre); ?>!</p>
    <p>Tienes <?php echo htmlspecialchars($edad); ?> años.</p>
    <p>Tu género es: <?php echo htmlspecialchars($genero); ?>.</p>
    <p>Vives en: <?php echo htmlspecialchars($pais); ?>.</p>
  <?php endif ?>
</body>
</html>
