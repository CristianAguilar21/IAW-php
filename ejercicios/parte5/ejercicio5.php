<form method="POST">
  <input type="number" name="n1" required>
  <select name="operacion">
    <option value="+">Suma</option>
    <option value="-">Resta</option>
    <option value="*">Multiplicación</option>
    <option value="/">División</option>
  </select>
  <input type="number" name="n2" required>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_POST) {
  $n1 = $_POST['n1'];
  $n2 = $_POST['n2'];
  $op = $_POST['operacion'];
  $res = 0;

  switch ($op) {
    case "+":
      $res = $n1 + $n2;
      break;
    case "-":
      $res = $n1 - $n2;
      break;
    case "*":
      $res = $n1 * $n2;
      break;
    case "/":
      $res = $n1 / $n2;
      break;
  }

  echo "Tu operacion $n1 $op $n2 = $res";
}
?>