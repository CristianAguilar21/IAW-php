<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="UTF-8" />
<title>Array en formularios</title>
</head>
<body>

<form action="" method="GET">
  Compras:<br/>
  <input type="checkbox" name="articulos[]" value="camiseta" id="menor" />
  <label for="menor">Camiseta Gucci 70€</label><br/>

  <input type="checkbox" name="articulos[]" value="pantalon" id="numerosa" />
  <label for="numerosa">Pantalon nike 50€</label><br/>

  <input type="checkbox" name="articulos[]" value="zapatillas" id="minima" />
  <label for="minima">Zapatillas Nike 60€</label><br/>

  <input type="submit" value="Enviar" />
</form>
<?php
if (isset($_GET['articulos'])) {
  # code...

$precios = [
  "camiseta" => "70",
  "pantalon" => "50",
  "zapatillas" => "60"
];
$total = 0;
$mis_articulos=$_GET['articulos'];
foreach ($mis_articulos as $seleccion){
  $preciosArticulo= $precios[$seleccion];
  $total = $total + $preciosArticulo;
}
echo"El total es " . $total . "€";
}
?>

</body>
</html>