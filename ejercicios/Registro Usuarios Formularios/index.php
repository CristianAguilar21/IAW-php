<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            /* Fondo gris muy claro */
            display: flex;
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
            min-height: 100vh;
            /* Ocupar toda la altura de la ventana */
            margin: 0;
        }

        /* Estilo del Contenedor del Formulario (La "Tarjeta") */
        .registro-card {
            background-color: #ffffff;
            /* Fondo blanco para la tarjeta */
            padding: 30px;
            border-radius: 8px;
            /* Esquinas redondeadas */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            max-width: 350px;
            width: 90%;
            /* Hace el formulario ligeramente responsivo */
            text-align: center;
        }

        /* Encabezado */
        h2 {
            color: #333;
            /* Color de texto oscuro */
            margin-bottom: 25px;
        }

        /* Estilo para los campos de formulario */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
            /* Alinea etiquetas a la izquierda */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            /* Texto de etiqueta semi-negrita */
            color: #555;
            font-size: 0.95em;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Asegura que padding no aumente el ancho */
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #007BFF;
            /* Borde azul al estar enfocado */
            outline: none;
            /* Elimina el contorno predeterminado del navegador */
        }

        /* Estilo del botón */
        button {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <div class="registro-card">
        <h2>Crear Cuenta</h2>

        <form action="registro_usuarios.php" method="POST">
            <div class="form-group">
                <label for="usuario">👤 Nombre de usuario:</label>
                <input type="text" name="usuario" id="usuario" required placeholder="Mín. 4 caracteres">
            </div>

            <div class="form-group">
                <label for="password">🔒 Contraseña:</label>
                <input type="password" name="password" id="password" required placeholder="Mín. 6 caracteres">
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>

</body>

</html>