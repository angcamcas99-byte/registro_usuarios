<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="contenedor">
        <h1>Crear cuenta</h1>
        <p>Introduce tus datos para registrarte</p>

        <form action="registrar.php" method="POST">

            <label for="usuario">Nombre de usuario</label>
            <input type="text" id="usuario" name="nombre_usuario" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Registrarse</button>

        </form>
    </div>

</body>
</html>