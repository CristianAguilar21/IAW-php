<?php
// Recibimos el parámetro de la URL o del Formulario
$jugador = isset($_REQUEST['eleccion']) ? $_REQUEST['eleccion'] : "";
$opcionesValidas = ["Piedra", "Papel", "Tijera"];

// Validación 1: Si está vacío, mostramos el formulario con desplegable
if (empty($jugador)) {
  echo "<h3>Juego: Piedra, Papel o Tijera</h3>";
  echo "<form method='POST'>";
  echo "  <label>Elige tu jugada:</label><br><br>";
  echo "  <select name='eleccion'>";
  echo "      <option value=''>-- Selecciona --</option>";
  echo "      <option value='Piedra'>Piedra</option>";
  echo "      <option value='Papel'>Papel</option>";
  echo "      <option value='Tijera'>Tijera</option>";
  echo "  </select>";
  echo "  <br><br>";
  echo "  <input type='submit' value='Jugar'>";
  echo "</form>";
}
// Validación 2: Comprobar que la opción sea válida
elseif (!in_array($jugador, $opcionesValidas)) {
  echo "Error: Opción no válida.<br>";
  echo "<a href='?'>Volver a intentar</a>";
} else {
  // --- LÓGICA DEL JUEGO ---
  $ordenador = $opcionesValidas[rand(0, 2)];

  echo "Tú elegiste: <b>$jugador</b><br>";
  echo "La máquina eligió: <b>$ordenador</b><br>";
  echo "--------------------------<br>";

  if ($jugador == $ordenador) {
    echo "Resultado: <b>EMPATE</b>";
  } elseif (
    ($jugador == "Piedra" && $ordenador == "Tijera") ||
    ($jugador == "Papel" && $ordenador == "Piedra") ||
    ($jugador == "Tijera" && $ordenador == "Papel")
  ) {
    echo "Resultado: <b>Genio Genio Genio Genio</b>";
  } else {
    echo "Resultado: <b>Noob Noob Noob Noob </b>";
  }

  // Enlace para limpiar la elección y volver al inicio
  echo "<br><br><a href='?'>Jugar otra vez</a>";
}
