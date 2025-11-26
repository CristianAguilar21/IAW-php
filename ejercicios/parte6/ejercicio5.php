<?php
session_start();

$productos = [
  1 => ['nombre' => 'Camiseta Retro', 'precio' => 15.00],
  2 => ['nombre' => 'Taza de Café',   'precio' => 5.50],
  3 => ['nombre' => 'Gorra Negra',    'precio' => 12.00],
  4 => ['nombre' => 'USB 64GB',       'precio' => 9.99],
  5 => ['nombre' => 'Ratón Gaming',   'precio' => 25.00],
];

if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = [];
}

if (isset($_POST['agregar'])) {
  $id = (int)$_POST['id_producto'];
  $cantidad = (int)$_POST['cantidad'];

  if (isset($productos[$id]) && $cantidad > 0) {
    if (isset($_SESSION['carrito'][$id])) {
      $_SESSION['carrito'][$id] += $cantidad;
    } else {
      $_SESSION['carrito'][$id] = $cantidad;
    }
  }
  header("Location: ?vista=tienda");
  exit;
}

if (isset($_GET['accion']) && $_GET['accion'] == 'borrar' && isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  unset($_SESSION['carrito'][$id]);
  header("Location: ?vista=carrito");
  exit;
}

if (isset($_GET['accion']) && $_GET['accion'] == 'vaciar') {
  unset($_SESSION['carrito']);
  header("Location: ?vista=carrito");
  exit;
}

$vista = isset($_GET['vista']) ? $_GET['vista'] : 'tienda';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Tienda Basica</title>
</head>

<body>

  <p>
    <a href="?vista=tienda">Ir a la Tienda</a> |
    <a href="?vista=carrito">Ver Carrito (<?php echo array_sum($_SESSION['carrito']); ?>)</a>
  </p>
  <hr>

  <?php if ($vista == 'carrito'): ?>

    <h3>Tu Carrito</h3>

    <?php if (empty($_SESSION['carrito'])): ?>
      <p>Vacio.</p>
    <?php else: ?>
      <table border="1">
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cant</th>
          <th>Subtotal</th>
          <th>Accion</th>
        </tr>
        <?php
        $total_general = 0;
        foreach ($_SESSION['carrito'] as $id => $cantidad):
          $producto_info = $productos[$id];
          $subtotal = $producto_info['precio'] * $cantidad;
          $total_general += $subtotal;
        ?>
          <tr>
            <td><?php echo $producto_info['nombre']; ?></td>
            <td><?php echo $producto_info['precio']; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td><?php echo $subtotal; ?></td>
            <td>
              <a href="?vista=carrito&accion=borrar&id=<?php echo $id; ?>">Borrar</a>
            </td>
          </tr>
        <?php endforeach; ?>

        <tr>
          <td colspan="3" align="right">TOTAL:</td>
          <td><?php echo $total_general; ?></td>
          <td></td>
        </tr>
      </table>

      <br>
      <a href="?vista=carrito&accion=vaciar">Vaciar Carrito</a>
    <?php endif; ?>

  <?php else: ?>

    <h3>Productos</h3>
    <ul>
      <?php foreach ($productos as $id => $prod): ?>
        <li>
          <strong><?php echo $prod['nombre']; ?></strong> - <?php echo $prod['precio']; ?> €
          <form method="post" style="display:inline;">
            <input type="hidden" name="id_producto" value="<?php echo $id; ?>">
            Cant: <input type="number" name="cantidad" value="1" style="width: 40px;">
            <input type="submit" name="agregar" value="Añadir">
          </form>
        </li>
      <?php endforeach; ?>
    </ul>

  <?php endif; ?>

</body>

</html>