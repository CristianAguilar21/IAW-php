<?php
session_start();

// Si ya hay una sesión activa, redirigimos directamente a secreta
if (isset($_SESSION['usuario'])) {
  header("Location: secreta.php");
  exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
  $usuario = $_POST['user'];
  $clave = $_POST['pass'];

  // Verificación de credenciales
  if ($usuario === 'admin' && $clave === '1234') {
    $_SESSION['usuario'] = $usuario;
    header("Location: secreta.php");
    exit;
  } else {
    $error = "Usuario o contraseña incorrectos.";
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: sans-serif;
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    form {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
      background: #f9f9f9;
    }

    div {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <form method="post" action="">
    <h2>Iniciar Sesión</h2>

    <?php if ($error): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <div>
      <label>Usuario:</label>
      <input type="text" name="user" required autofocus placeholder="admin">
    </div>

    <div>
      <label>Contraseña:</label>
      <input type="password" name="pass" required placeholder="1234">
    </div>

    <input type="submit" value="Entrar">
  </form>

</body>

</html>