<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conexion = conectar();

    // Verificar el usuario y la contraseña
    $sql = "SELECT * FROM registro WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        // Verifica si la contraseña coincide
        if ($fila['contrasena'] === $contrasena) {
            $_SESSION['usuario'] = $fila['usuario'];
            header("Location: inicio.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    mysqli_close($conexion);
}
?>