<?php


// Comprobamos que el formulario se haya enviado mediante POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recuperamos los datos del formulario.
$nombre = trim($_POST["nombre_usuario"] ?? "");
$contrasena = $_POST["contrasena"] ?? "";

// Validamos que los campos no estén vacíos.
if ($nombre === "" || $contrasena === "") {
    die("Debes completar todos los campos.");
}

// Comprobamos la longitud del nombre.
if (strlen($nombre) > 50) {
    die("El nombre de usuario es demasiado largo.");
}

// Comprobamos la longitud de la contraseña.
if (strlen($contrasena) < 8) {
    die("La contraseña debe tener al menos 8 caracteres.");
}

require_once "conexion.php";

// Generamos un hash seguro de la contraseña.
$hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Preparamos la consulta SQL.
$sql = "INSERT INTO usuarios (nombre_usuario, contrasena)
        VALUES (?, ?)";

$consulta = mysqli_prepare($conexion, $sql);

// Asociamos los valores a los parámetros.
mysqli_stmt_bind_param($consulta, "ss", $nombre, $hash);

// Ejecutamos la consulta.
if (mysqli_stmt_execute($consulta)) {

    echo "Usuario registrado correctamente.";

} else {

    echo "No se ha podido completar el registro.";

}

// Cerramos la consulta.
mysqli_stmt_close($consulta);

// Cerramos la conexión.
mysqli_close($conexion);

?>


