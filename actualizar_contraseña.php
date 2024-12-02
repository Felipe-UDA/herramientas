<?php
include "conexion.php";
$con = conectar();

$correo = $_POST['correo'];
$nueva_contrasena = $_POST['nueva_contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];

if ($nueva_contrasena === $confirmar_contrasena) {
    $sql = "UPDATE registro SET contrasena = ? WHERE correo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nueva_contrasena, $correo);

    if ($stmt->execute()) {
        $cambioExitoso = true;
    } else {
        $cambioExitoso = false;
    }
} else {
    $cambioExitoso = false;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="confirmacionModal" tabindex="-1" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmacionModalLabel">Resultado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($cambioExitoso): ?>
                        <p>La contraseña se ha cambiado correctamente.</p>
                    <?php else: ?>
                        <p>Hubo un error al cambiar la contraseña. Por favor, inténtalo de nuevo.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button id="cerrarVentana" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar el modal automáticamente
        var confirmacionModal = new bootstrap.Modal(document.getElementById('confirmacionModal'));
        confirmacionModal.show();

        // Manejar el botón de "Aceptar"
        document.getElementById('cerrarVentana').addEventListener('click', function() {
            window.close(); // Intenta cerrar la ventana
            if (!window.closed) {
                window.location.href = "inicio.php"; // Si no puede cerrarse, redirige al inicio
            }
        });
    </script>
</body>
</html>
