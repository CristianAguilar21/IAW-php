<?php
function calcular_media($datos)
{
  if (count($datos) == 0) return 0;
  $suma = array_sum($datos);
  return $suma / count($datos);
}

function calcular_maximo($datos)
{
  if (count($datos) == 0) return 0;
  return max($datos);
}

function calcular_minimo($datos)
{
  if (count($datos) == 0) return 0;
  return min($datos);
}

function imprimir_array($datos)
{
  echo "<table border='1' style='border-collapse: collapse; width: 200px;'>";
  echo "<tr><th>Posición</th><th>Valor</th></tr>";

  foreach ($datos as $posicion => $valor) {
    echo "<tr>";
    echo "<td>$posicion</td>";
    echo "<td>$valor</td>";
    echo "</tr>";
  }

  echo "</table>";
}
