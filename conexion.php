<?php

$conexion = mysqli_connect("localhost", "root", "", "registro_usuarios");

if (!$conexion) {
    die("Error al conectar con la base de datos");
}


