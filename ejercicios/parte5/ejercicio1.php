<form method="POST">
  Romano: <input type="text" name="r">
  <input type="submit" name="s" value="Dale">
</form>

<?php
if (isset($_REQUEST['s'])) {
  $r = strtoupper($_REQUEST['r']);

  if (!$r) {
    echo "Error: Esta vacio";
  } elseif (preg_match('/[^IVXLCDM]/', $r)) {
    echo "Error: Caracteres raros";
  } else {
    $m = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000];
    $d = 0;
    $l = strlen($r);

    for ($i = 0; $i < $l; $i++) {
      $v1 = $m[$r[$i]];
      $v2 = ($i + 1 < $l) ? $m[$r[$i + 1]] : 0;
      if ($v1 < $v2) $d -= $v1;
      else $d += $v1;
    }
    echo "Es el numero: $d";
  }
}
?>