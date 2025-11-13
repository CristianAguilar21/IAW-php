<?php
$tamano = 8;
$tamanoCelda = 50; 
echo '<table border="1" cellspacing="0" cellpadding="0">';
for ($fila = 0; $fila < $tamano; $fila++) {
    echo '<tr>';
    for ($col = 0; $col < $tamano; $col++) {
        $total = $fila + $col;
        if ($total % 2 == 0) {
            $color = "#FFFFFF";
        } else {
            $color = "#000000";
        }
        echo "<td style='width: ${tamanoCelda}px; height: ${tamanoCelda}px;' bgcolor='$color'></td>";
    }
    echo '</tr>';
}
echo '</table>';

?>