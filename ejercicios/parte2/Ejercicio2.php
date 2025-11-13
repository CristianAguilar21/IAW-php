<?php
$nota = rand(0,10);
if ($nota < 5) {
  echo 'Insuficiente';
} elseif ($nota < 6) { 
  echo "Suficiente";
} elseif ($nota < 7) {
  echo"Bien";  
} elseif ($nota < 9) {
  echo"Notable";
} else {
  echo "Sobresaliente";}
?>