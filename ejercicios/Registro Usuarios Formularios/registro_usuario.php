<?php
// 1. Recibir datos del formulario
// Usamos el operador null coalescing (??) para evitar errores si no llegan datos
$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// 2. Validaciones (según enunciado)
// Usuario > 3 caracteres y Contraseña > 5 caracteres
if (strlen($usuario) <= 3 || strlen($password) <= 5) {
  echo "<h1>Error en el registro</h1>";
  echo "<p>El usuario debe tener más de 3 caracteres y la contraseña más de 5.</p>";
  echo "<a href='formulario.php'>Volver al formulario</a>";
  exit(); // Detenemos la ejecución
}

// 3. Cifrado de la contraseña
// Usamos PASSWORD_DEFAULT que utiliza Bcrypt (Blowfish) como indica el texto.
// Esto genera automáticamente la sal segura y el coste predeterminado (10).
$password_cifrada = password_hash($password, PASSWORD_DEFAULT);

// 4. Gestión del archivo JSON
$archivo = 'usuarios.json';

// Leemos el contenido actual del archivo
if (file_exists($archivo)) {
  $contenido_json = file_get_contents($archivo);
  $lista_usuarios = json_decode($contenido_json, true);
} else {
  $lista_usuarios = array();
}

// Creamos el array del nuevo usuario
$nuevo_usuario = array(
  "nombre" => $usuario,
  "clave" => $password_cifrada
);

// Añadimos el usuario a la lista
$lista_usuarios[] = $nuevo_usuario;

// Convertimos el array actualizado a formato JSON
// JSON_PRETTY_PRINT ayuda a que el archivo sea legible por humanos
$json_actualizado = json_encode($lista_usuarios, JSON_PRETTY_PRINT);

// Guardamos los datos en el archivo
if (file_put_contents($archivo, $json_actualizado)) {
  echo "<h1>¡Registro Exitoso!</h1>";
  echo "<p>El usuario <strong>" . htmlspecialchars($usuario) . "</strong> ha sido registrado.</p>";
  echo "<p>Hash generado (Blowfish): " . $password_cifrada . "</p>";
  echo "<br><a href='formulario.php'>Registrar otro usuario</a>";
} else {
  echo "<h1>Error</h1>";
  echo "<p>No se pudo guardar el usuario.</p>";
}
?>