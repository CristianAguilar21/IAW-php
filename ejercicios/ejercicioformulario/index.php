<!DOCTYPE html>
<html lang="es">
<head>
 	<meta charset="UTF-8" />
 	<title>Ejercicio Formulario con CSS</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }
        .formulario {
            display: flex;
            flex-direction: column;
        }
        .formulario input[type="text"],
        .formulario input[type="number"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .formulario input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .formulario input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 25px;
            padding: 20px;
            background-color: #e6f7ff;
            border: 1px solid #b3e0ff;
            border-radius: 4px;
        }
        .resultado h3 {
            margin-top: 0;
            color: #0056b3;
        }
        .resultado p {
            margin: 0;
            font-size: 1.1em;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Calculadora de Salario</h2>

    <form action="" method="get" class="formulario">
      <input type="text" name="nombre" required placeholder="Nombre">
      <input type="text" name="apellido" required placeholder="Apellido">
      <input type="number" name="salario" step="any" required placeholder="Salario">
      <input type="number" name="edad" required placeholder="Edad">
      <input type="submit" value="Calcular Nuevo Salario">
    </form>

    <?php
    if (isset($_GET['salario'])) {

     	$nombre = $_GET['nombre'];
     	$apellido = $_GET['apellido'];
     	$salario = (float) $_GET['salario'];
     	$edad = (int) $_GET['edad'];

        // 1. Calculamos el nuevo salario y lo guardamos en una variable
        $nuevoSalario = $salario; 

     	if ($salario < 1000) {
     	 	if ($edad < 30) {
     	 	 	$nuevoSalario = 1100;
     	 	} elseif ($edad >= 30 && $edad <= 45) {
     	 	 	$nuevoSalario = $salario * 1.03;
     	 	} else {
     	 	 	$nuevoSalario = $salario * 1.15;
     	 	}
     	} 
     	elseif ($salario >= 1000 && $salario <= 2000) {
     	 	if ($edad > 45) {
     	 	 	$nuevoSalario = $salario * 1.03;
     	 	} else {
     	 	 	$nuevoSalario = $salario * 1.10;
     	 	}
     	} 
        // Si es > 2000, $nuevoSalario sigue siendo igual a $salario, así que no hay 'else'.

        
        // 2. Mostramos el resultado con el div y tu frase
        echo "<div class='resultado'>";
     	echo "<h3>Análisis para: $nombre $apellido</h3>";
        
        // --- ESTA ES LA LÍNEA QUE QUERÍAS ---
        // (He corregido "salrio" por "salario" y he añadido el formato de número)
     	echo "<p>Hola $nombre, tu nuevo salario es <strong>" . number_format($nuevoSalario, 2, ',', '.') . "€</strong></p>";
        // ------------------------------------
        
        echo "</div>";
    }
    ?>
</div>

</body>
</html>