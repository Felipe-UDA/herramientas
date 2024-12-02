<?php
session_start(); 

include 'conexion.php'; 
$con = conectar();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    if (!empty($usuario) && !empty($contraseña)) {
        
        $consulta = "SELECT * FROM formulario WHERE usuario = ? AND contraseña = ?";
        $stmt = $con->prepare($consulta);
        $stmt->bind_param("ss", $usuario, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
           
            $_SESSION['usuario'] = $usuario; 
            header("Location: index.php"); 
            exit();
        } else {
            
            echo "<script>alert('ERROR DE AUTENTICACIÓN: Usuario o contraseña incorrectos.'); window.location.href='index.php';</script>";
        }

        
        $stmt->close();
        $con->close();
    } else {
        echo "<script>alert('Por favor, completa todos los campos.'); window.location.href='index.php';</script>";
    }
} else {
    header("Location: index.php"); 
    exit();
}
?>
