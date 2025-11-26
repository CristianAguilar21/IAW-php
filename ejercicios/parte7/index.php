<?php
include 'funciones.php';

$mis_numeros = [15, 8, 22, 5, 10, 30];

echo "<h3>Array Original:</h3>";
imprimir_array($mis_numeros);

echo "<br>";
echo "<strong>Media:</strong> " . calcular_media($mis_numeros) . "<br>";
echo "<strong>Máximo:</strong> " . calcular_maximo($mis_numeros) . "<br>";
echo "<strong>Mínimo:</strong> " . calcular_minimo($mis_numeros) . "<br>";
