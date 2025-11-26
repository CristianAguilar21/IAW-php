<?php
session_start();

// 1. Lógica de Logout
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit;
}

// 2. Seguridad: Si no existe la variable de sesión, denegamos el acceso
if (!isset($_SESSION['usuario'])) {
  die("<h1 style='color:red; font-family:sans-serif'>Prohibido</h1><p>No has iniciado sesión.</p><a href='login.php'>Ir al Login</a>");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Página Secreta</title>
</head>

<body style="background-color: #e0f7fa; font-family: sans-serif; padding: 20px;">
  <h1>¡Bienvenido a la Zona Secreta!</h1>
  <p>Hola, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>.</p>
  <p>Aquí está la información confidencial que solo tú puedes ver.</p>

  <hr>

  <form method="post">
    <input type="submit" name="logout" value="Cerrar sesión" style="padding: 10px; cursor: pointer;">
  </form>
</body>

</html>