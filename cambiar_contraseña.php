<?php
// Verificamos que el correo venga como parámetro en la URL
if (!isset($_GET['correo']) || empty($_GET['correo'])) {
    echo "Correo no especificado.";
    exit();
}

$correo = $_GET['correo']; // Obtenemos el correo de la URL
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Cambiar Contraseña</h2>
        <form action="actualizar_contraseña.php" method="POST" class="mt-4">
            
            <input type="hidden" name="correo" value="<?php echo htmlspecialchars($correo); ?>">
            
            
            <div class="mb-3">
                <label for="nueva_contrasena" class="form-label">Nueva Contraseña</label>
                <input type="password" name="nueva_contrasena" class="form-control" id="nueva_contrasena" required>
            </div>
            
        
            <div class="mb-3">
                <label for="confirmar_contrasena" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="confirmar_contrasena" class="form-control" id="confirmar_contrasena" required>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
