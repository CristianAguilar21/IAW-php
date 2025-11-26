<?php
$frase = "Me gusta estudiar y aprender, pero sobre todo me gusta IAW";

// 1. Letra por letra (imprimimos seguido y saltamos de línea al final)
for ($i = 0; $i < strlen($frase); $i++) {
  echo $frase[$i];
}
echo "<br>";

// 2. Inverso con bucle (imprimimos seguido y saltamos de línea al final)
for ($i = strlen($frase) - 1; $i >= 0; $i--) {
  echo $frase[$i];
}
echo "<br>";

// 3. Tamaño
echo strlen($frase) . "<br>";

// 4. Mayúsculas
echo strtoupper($frase);
