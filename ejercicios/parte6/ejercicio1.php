<?php
session_start();

if (isset($_POST['reiniciar'])) {
  session_unset();
  session_destroy();
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

if (!isset($_SESSION['visitas'])) {
  $_SESSION['visitas'] = 1;
} else {
  $_SESSION['visitas']++;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contador de Visitas</title>
</head>

<body>
  <h1>Has recargado esta página: <?php echo $_SESSION['visitas']; ?> veces</h1>

  <form method="post">
    <input type="submit" name="reiniciar" value="Reiniciar sesión">
  </form>
</body>

</html>