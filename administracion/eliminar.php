<?php
// Incluir la conexión a la base de datos
include('administracion/conexion.php'); // Asegúrate de que 'conexion.php' está configurado correctamente
$conn = conectar();  

if (isset($_GET['id_usuario'])) {
    // Obtener el id_usuario desde la URL
    $id_usuario = $_GET['id_usuario'];

    // Preparar la consulta SQL para eliminar el registro de la tabla
    $sql = "DELETE FROM registro WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);  // Asegúrate de que el parámetro es un entero

    if ($stmt->execute()) {
        // Si la ejecución es exitosa, redirigir a la página principal
        header("Location: administrar_registro.php");  // Redirige a la página donde se gestionan los registros
        exit;
    } else {
        // Si ocurre un error, mostrar el mensaje de error
        echo "<div class='alert alert-danger'>Error al eliminar el registro.</div>";
    }

    // Cerrar la conexión
    $stmt->close();
} else {
    // Si no se pasa el id_usuario, mostrar un mensaje de error
    echo "<div class='alert alert-danger'>No se especificó un ID de usuario para eliminar.</div>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>