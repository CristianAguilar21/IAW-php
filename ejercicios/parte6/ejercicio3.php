<?php
// 1. ACTIVAR REPORTE DE ERRORES (Para que no salga pantalla blanca si algo falla)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
header('Content-Type: text/html; charset=utf-8');

$palabras = [
  "ARBOL",
  "TIGRE",
  "PLAYA",
  "MANGO",
  "RUEDA",
  "LUNES",
  "GALLO",
  "NIEVE",
  "MOVER",
  "DULCE",
  "CARTA",
  "LLAVE",
  "BRUMA",
  "SILLA",
  "FRESA",
  "CANTO",
  "BORDE",
  "FLACO",
  "BARCO",
  "CLARA",
  "CAMPO",
  "VOTAR",
  "SALTA",
  "PARED",
  "TENIS",
  "JUGAR",
  "VIENTO",
  "MESA",
  "BROMA",
  "RAMPA",
  "BISTE",
  "LLORO",
  "VERDE",
  "HUEVO",
  "RIOS",
  "TRAGO",
  "ZORRO",
  "RESTO",
  "COPA",
  "REZAR",
  "MANTO",
  "NUBES",
  "MAREA",
  "LEJOS",
  "GLOBO",
  "JUNTO",
  "NACER",
  "NADAR",
  "ZEBRA",
  "ROSAS",
  "LIBRO",
  "PARDO",
  "CREMA",
  "MANO",
  "MURAL",
  "VACIO",
  "PUNTO",
  "CIELO",
  "METAL",
  "GIRAR",
  "TRUCO",
  "RISAS",
  "BESAR",
  "GRANO",
  "RONDA",
  "LUZCO",
  "CERCA",
  "BANDA",
  "MORRO",
  "PATIO",
  "BURRO",
  "LARGO",
  "JOVEN",
  "FRENO",
  "SUELO",
  "BOSCO",
  "VOLAR",
  "RAPIDO",
  "GRABA",
  "REINA",
  "TOQUE",
  "NIEVE",
  "BRISA",
  "RIEGO",
  "FRUTA",
  "TONTO",
  "RIVAL",
  "MENTE",
  "LANZA",
  "RUEGO",
  "FALLO",
  "ROCA",
  "BORDE",
  "FURIA",
  "CALOR",
  "CALLE",
  "TORRE",
  "MIEDO",
  "CICLO",
  "GOMA"
];

$msg = "";
$fin = false;

// Función para dividir texto UTF-8 carácter a carácter sin mbstring
function separar_letras($str)
{
  return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
}

// Lógica de inicio / reinicio
if (isset($_POST['reset']) || !isset($_SESSION['secreto'])) {
  $rand = array_rand($palabras);
  $palabra = $palabras[$rand];

  // Usamos la función personalizada en lugar de mb_strlen/substr
  $letras = separar_letras($palabra);

  $_SESSION['secreto'] = $palabra;
  $_SESSION['array_secreto'] = $letras;
  $_SESSION['visual'] = array_fill(0, count($letras), '_');
  $_SESSION['usadas'] = [];
  $_SESSION['intentos'] = 0;
  $_SESSION['puntos'] = 100;
  $_SESSION['vidas'] = 6;
}

// Lógica de juego
if (isset($_POST['char']) && $_SESSION['vidas'] > 0) {
  // Convertir a mayúsculas de forma básica
  $char = strtoupper(trim($_POST['char']));

  // Parche para tildes si strtoupper falla en tu sistema
  $reemplazos = ['á' => 'Á', 'é' => 'É', 'í' => 'Í', 'ó' => 'Ó', 'ú' => 'Ú', 'ñ' => 'Ñ'];
  if (isset($reemplazos[$char])) $char = $reemplazos[$char];

  // Verificar si es 1 carácter y no está usado
  if (preg_match('/^.{1}$/u', $char) && !in_array($char, $_SESSION['usadas'])) {
    $_SESSION['usadas'][] = $char;
    $_SESSION['intentos']++;

    $match = false;
    foreach ($_SESSION['array_secreto'] as $k => $v) {
      // Comparación simple
      if ($v == $char) {
        $_SESSION['visual'][$k] = $char;
        $match = true;
      }
    }

    if ($match) {
      $_SESSION['puntos'] += 20;
      $msg = "¡Bien! '$char' está.";
    } else {
      $_SESSION['puntos'] -= 10;
      $_SESSION['vidas']--;
      $msg = "Fallo. '$char' no está.";
    }
  } elseif (in_array($char, $_SESSION['usadas'])) {
    $msg = "Repetida: '$char'.";
  }
}

// Comprobaciones finales
if ($_SESSION['vidas'] <= 0) {
  $msg = "GAME OVER. Era: " . $_SESSION['secreto'];
  $fin = true;
} elseif (implode('', $_SESSION['visual']) === $_SESSION['secreto']) {
  $msg = "¡GANASTE! Era: " . $_SESSION['secreto'];
  $_SESSION['puntos'] += 50;
  $fin = true;
}

if ($_SESSION['puntos'] < 0) $_SESSION['puntos'] = 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Adivina</title>
</head>

<body>
  <h1>Juego de Palabras</h1>

  <!-- Mostrar palabra oculta -->
  <h2>
    <?php foreach ($_SESSION['visual'] as $l): ?>
      <?php echo $l . " "; ?>
    <?php endforeach; ?>
  </h2>

  <p>Puntos: <b><?php echo $_SESSION['puntos']; ?></b> | Vidas: <b><?php echo $_SESSION['vidas']; ?></b></p>

  <?php if ($msg): ?>
    <p style="background: #eee; padding: 5px;"><?php echo $msg; ?></p>
  <?php endif; ?>

  <?php if (!$fin): ?>
    <form method="post">
      Letra: <input type="text" name="char" maxlength="1" required autofocus autocomplete="off" size="1">
      <input type="submit" value="Probar">
    </form>
  <?php else: ?>
    <form method="post">
      <input type="submit" name="reset" value="Jugar otra vez">
    </form>
  <?php endif; ?>

  <p><small>Usadas: <?php echo implode(", ", $_SESSION['usadas']); ?></small></p>
</body>

</html>