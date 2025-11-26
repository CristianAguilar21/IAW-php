<?php
function imprimir_tabla($numero)
{
  echo "<h3>Tabla del $numero</h3>";
  for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado<br>";
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Tabla de Multiplicar</title>
</head>

<body>

  <form method="post">
    Introduce un número: <input type="number" name="numero" required>
    <input type="submit" value="Generar Tabla">
  </form>

  <?php
  if (isset($_POST['numero'])) {
    $n = (int)$_POST['numero'];
    imprimir_tabla($n);
  }
  ?>

</body>

</html>