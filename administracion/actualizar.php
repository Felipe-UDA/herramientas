<?php

include('conexion.php');
$conn = conectar();

// Obtener los datos del formulario
$id_usuario = $_POST['edit_id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$rut = $_POST['rut'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

// Preparar la consulta SQL para actualizar el registro
if (!empty($contraseña)) {
    // Si la contraseña se ha proporcionado, la actualizamos también
    $stmt = $conn->prepare("UPDATE registro SET nombre=?, apellido=?, rut=?, correo=?, `contraseña`=? WHERE id_usuario=?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $rut, $correo, $contraseña, $id_usuario);
} else {
    // Si la contraseña no se proporciona, no la actualizamos
    $stmt = $conn->prepare("UPDATE registro SET nombre=?, apellido=?, rut=?, correo=? WHERE id_usuario=?");
    $stmt->bind_param("ssssi", $nombre, $apellido, $rut, $correo, $id_usuario);
}

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Registro actualizado correctamente.</div>";
} else {
    echo "<div class='alert alert-danger'>Error al actualizar: " . $stmt->error . "</div>";
}
?>
