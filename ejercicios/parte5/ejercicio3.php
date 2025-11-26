<?php
if (isset($_POST['anio'])) {

  $anio = $_POST['anio'];

  if (!is_numeric($anio)) {
    echo "<h3>Error: No has puesto un número válido.</h3>";
  } elseif (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
    echo "<h3>El año $anio SÍ es bisiesto.</h3>";
  } else {
    echo "<h3>El año $anio NO es bisiesto.</h3>";
  }

  echo '<a href="">Probar otro número</a>';
} else {
?>

  <p>Por favor, escribe el año que quieres comprobar:</p>

  <form method="POST">
    <input type="number" name="anio" autofocus required>
    <button type="submit">Calcular</button>
  </form>

<?php
}
?>