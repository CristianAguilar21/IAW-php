<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 5px; margin-top: 5px; }
        button { margin-top: 15px; width: 100%; padding: 10px; background: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Crear Cuenta</h2>
    
    <form action="registro_usuarios.php" method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Mín. 4 caracteres">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required placeholder="Mín. 6 caracteres">

        <button type="submit">Registrar</button>
    </form>

</body>
</html><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 5px; margin-top: 5px; }
        button { margin-top: 15px; width: 100%; padding: 10px; background: #007BFF; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Crear Cuenta</h2>
    
    <form action="registro_usuarios.php" method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Mín. 4 caracteres">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required placeholder="Mín. 6 caracteres">

        <button type="submit">Registrar</button>
    </form>

</body>
</html>