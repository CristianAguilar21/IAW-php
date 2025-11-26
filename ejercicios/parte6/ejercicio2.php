<?php
session_start();

$mensaje = "";

if (!isset($_SESSION['numero_secreto'])) {
  $_SESSION['numero_secreto'] = rand(1, 100);
  $_SESSION['intentos'] = 0;
}

// Procesar el formulario cuando se envía
if (isset($_POST['numero_usuario'])) {
  $numero_usuario = (int)$_POST['numero_usuario'];
  $_SESSION['intentos']++;

  if ($numero_usuario < $_SESSION['numero_secreto']) {
    $mensaje = "El número buscado es <strong>MAYOR</strong> que $numero_usuario.";
  } elseif ($numero_usuario > $_SESSION['numero_secreto']) {
    $mensaje = "El número buscado es <strong>MENOR</strong> que $numero_usuario.";
  } else {
    // El usuario acertó
    $intentos_finales = $_SESSION['intentos'];
    $numero_anterior = $_SESSION['numero_secreto'];

    $mensaje = "¡Felicidades! Adivinaste el número <strong>$numero_anterior</strong> en <strong>$intentos_finales</strong> intentos.<br>¡Se ha generado un nuevo número!";

    $_SESSION['numero_secreto'] = rand(1, 100);
    $_SESSION['intentos'] = 0;
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adivina el Número</title>
</head>

<body>

  <h1>Adivina el Número (1-100)</h1>

  <form method="post" action="">
    Número: <input type="number" name="numero_usuario" required autofocus placeholder="#" min="1" max="100">
    <input type="submit" value="Probar suerte">
  </form>

  <p>
    Intentos actuales: <?php echo $_SESSION['intentos']; ?>
  </p>

  <?php if ($mensaje): ?>
    <p>
      <?php echo $mensaje; ?>
    </p>
  <?php endif; ?>

</body>

</html>