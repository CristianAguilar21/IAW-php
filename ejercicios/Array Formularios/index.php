<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8" />
  <title>Tienda con Estilo</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      padding-top: 50px;
    }

    .contenedor {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    h2 {
      color: #333;
      text-align: center;
      margin-top: 0;
    }

    .opcion {
      margin-bottom: 10px;
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    label {
      font-size: 16px;
      cursor: pointer;
      color: #555;
    }

    input[type="checkbox"] {
      margin-right: 10px;
      transform: scale(1.2);
    }

    input[type="button"] {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: background 0.3s;
    }

    input[type="button"]:hover {
      background-color: #0056b3;
    }

    .resultado {
      margin-top: 20px;
      padding: 15px;
      background-color: #e8f5e9;
      border: 1px solid #c8e6c9;
      border-radius: 5px;
      text-align: center;
      display: none;
    }

    .precio-final {
      font-size: 24px;
      font-weight: bold;
      color: #2e7d32;
    }
  </style>
</head>

<body>

  <div class="contenedor">
    <h2>Carrito de Compra</h2>

    <form id="formulario-compra">
      <div class="opcion">
        <input type="checkbox" name="articulos[]" value="70" id="item1" />
        <label for="item1">Camiseta Gucci (70€)</label>
      </div>

      <div class="opcion">
        <input type="checkbox" name="articulos[]" value="50" id="item2" />
        <label for="item2">Pantalón Nike (50€)</label>
      </div>

      <div class="opcion">
        <input type="checkbox" name="articulos[]" value="80" id="item3" />
        <label for="item3">Zapatillas Adidas (80€)</label>
      </div>

      <input type="button" value="Calcular Total" id="btn-calcular" />
    </form>

    <div class="resultado" id="resultado-compra">
      <p>El total de tu compra es:</p>
      <p class="precio-final"><span id="total-precio">0</span>€</p>
    </div>
  </div>

  <script>
    document.getElementById('btn-calcular').addEventListener('click', function () {
      let articulosSeleccionados = document.querySelectorAll('input[name="articulos[]"]:checked');
      let total = 0;

      articulosSeleccionados.forEach(function (item) {
        total += parseInt(item.value);
      });

      document.getElementById('total-precio').textContent = total;
      document.getElementById('resultado-compra').style.display = 'block';
    });
  </script>
</body>

</html>