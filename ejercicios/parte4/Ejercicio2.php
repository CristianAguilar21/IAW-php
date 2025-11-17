<?php
$media = 0;
$acumulador = 0;
$min = 56346546456455564;
$max = 0;
$num = array("1", "7", "19", "30", "16", "28", "15", "4", "20", "2");
for ($i = 0; $i < count($num); $i++) {
  echo $num[$i] . "<br>";
  $acumulador = $acumulador + $num[$i];
  if ($num[$i] > $max) {
    $max = $num[$i];
  }
  if ($num[$i] < $min) {
    $min = $num[$i];
  }
}
;
echo "El valor minimo es " . $min . "<br>";
echo "El valor maximo es " . $max . "<br>";
$media = $acumulador / count($num);
echo "media:" . $media;
echo "<br> Max= " . max($num);
echo "<br> Min= " . min($num);
?>