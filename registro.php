<?php
//Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "herramientas"; //base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$conn->set_charset("utf8");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; // Encriptar la contraseña

    // Consulta SQL para insertar los datos en la tabla clientes
    $sql = "INSERT INTO registro (nombre, apellido, rut, usuario, correo, `contrasena`) VALUES ('$nombre', '$apellido', '$rut', '$usuario', '$correo', '$contrasena')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_registro2.css"> <!-- Verifica que el archivo CSS esté en el mismo directorio -->

    <style>
        body {
            background-image: url('imagenes/fondo-abstracto-textura_1258-30493.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto text-left">
                <img src="imagenes\Champions-League-png-blanco.webp" class="logo" alt="Logo">
            </div>
            <div class="col-auto text-right">
                <a href="login.html" target="_blank" class="btn custom-button">Login</a>
                <a href="registro.html" target="_blank" class="btn custom-button">Registro</a>
                <a href="nosotros.html" target="_blank" class="btn custom-button">Nosotros</a>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-5">
            <form action="registro.php" method="post" class="bg-dark p-3 rounded">
                    <h3>Registro</h3>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="rut">RUT:</label>
                        <input type="text" class="form-control" id="rut" name="rut" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">USUARIO:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="correo" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>                  
                    <div class="form-group">
                    <!-- Aquí agregamos el "onclick" para deshabilitar el botón -->
                    <input type="submit" class="btn custom-button" value="Registrar" onclick="this.disabled=true; this.form.submit();">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-links">
                <h3>Partidos</h3>
                <a href="#">Tabla</a>
                <a href="#">Videos</a>
                <a href="#">Gaming</a>
                <a href="#">Estadisticas</a>
            </div>
            <div class="footer-links">
                <h3>Equipos</h3>
                <a href="#">Nuevo Formato</a>
                <a href="#">Noticias</a>
                <a href="#">Historia</a>
                <a href="#">Acerca de</a>
                <a href="#">Tienda</a>
            </div>
            <div class="footer-links">
                <h3>También visita</h3>
                <a href="#">UEFA.com</a>
                <a href="#">UEFA Foundation</a>
            </div>
            <div class="footer-social">
                <h3>Síguenos en</h3>
                <a href="#">X</a>
                <a href="#">Facebook</a>
                <a href="#">YouTube</a>
                <a href="#">Instagram</a>
            </div>
            <div class="footer-legal">
                <a href="#">Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Cookie Settings</a>
                <p>&copy; 1998-2024 Felipe Monardes. Derechos Reservados</p>
            </div>
        </div>
    </footer>

    <div>
        <img src="/imagenes/footer.png" class="imagen_footer" alt="Imagen de Footer">
    </div>
</body>
</html>
