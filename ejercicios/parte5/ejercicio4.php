<?php
if (isset($_POST['numero'])) {
  $n = $_POST['numero'];

  if ($n >= 1 && $n <= 10) {
    echo "<h3>Tabla del $n</h3>";
    for ($i = 1; $i <= 10; $i++) {
      echo "$n x $i = " . ($n * $i) . "<br>";
    }
  } else {
    echo "Por favor, introduce un número del 1 al 10.";
  }
  echo '<br><a href="">Volver</a>';
} else {
  echo '<form method="POST">
            <label>Número (1-10): </label>
            <input type="number" name="numero" required min="1" max="10">
            <button type="submit">Ver tabla</button>
          </form>';
}
