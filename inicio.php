<?php
session_start(); // Iniciar la sesión para acceder a las variables de sesión
include('conexion.php'); // Incluye la conexión a la base de datos

// Verifica si el usuario ha iniciado sesión
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_3.css">

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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary position-absolute w-100" style="z-index: 10;" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="inicio.php">
                <img src="imagenes/Champions-League-png-blanco.webp" alt="Logo" width="60" height="60">
            </a>
            
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Sidebar -->
            <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <!-- Sidebar encabezado -->
                <div class="offcanvas-header text-white border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <!-- Sidebar cuerpo -->
                <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                    <ul class="navbar-nav justify-content-start align-items-center fs-4 flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        
                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Más
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="nosotros.php" target="_blank">Nosotros</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="panel.php" target="_blank">Panel de control</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <?php if ($usuario): ?>
                        <span class="text-white me-3">Bienvenido, <?= htmlspecialchars($usuario); ?>!</span>
                        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="registrar.php" class="text-white">Registrarse</a>
                        <a href="#" class="text-white text-decoration-none px-3 py-1 rounded-4" 
                         
                        data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        
    <!-- Modal de autenticación -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="contrasena">Contraseña</label>
                            <input name="contrasena" type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
                        </div>
                        <div class="modal-footer">
                            <a href="recuperar_contra.php" target="_blank" class="btn btn-outline-warning">Recuperar contraseña</a>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="banner">
        <div>
            <video src="imagenes\intro_champions.mp4" autoplay muted loop playsinline></video>
        </div>
    </section>

    <div>
        <h1>Partidos Historicos</h1>
    </div>

    <div class="gallery-container">
        
        <div class="gallery">
            <div class="card">
                <img src="imagenes\8-2 bayern.jpg" alt="Trofeo 1">
                <p>Bayern Munich 8 / Barcelona 2</p>
            </div>
            <div class="card">
                <img src="imagenes\juve_3.jpg" alt="Trofeo 2">
                <p>Juventus 3 / Atletico Madrid 0</p>
            </div>
            <div class="card">
                <img src="imagenes\totten_3.jpg" alt="Trofeo 3">
                <p>Tottenham 3 / Ajax 2</p>
            </div>
            <div class="card">
                <img src="imagenes\liverpool_4.jpg" alt="Trofeo 4">
                <p>Liverpool 4 / Barcelona 0</p>
            </div>
            <div class="card">
                <img src="imagenes\barca_chelsea.jpg" alt="Trofeo 4">
                <p>Chelsea 1 / Barcelona 1</p>
            </div>
            <div class="card">
                <img src="imagenes\final_2013.jpg" alt="Trofeo 4">
                <p>Bayern Munich 2 / Borussia Dortmund 1</p>
            </div>
        </div>
        
    </div>

    <br>

    <div>
        <h1>Ultimas Noticias</h1>
    </div>

    <div class="container news-section" style="color: white;">
    
        <div class="row">
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\Raphinha.jpeg" alt="Noticia 1">
                    <div class="news-text">
                        <h5>Raphina le da la victoria al Barcelona</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\ancellotti.webp" alt="Noticia 2">
                    <div class="news-text">
                        <h5>¿Ancelotti debe seguir al mando del Real?</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\var.jpg" alt="Noticia 3">
                    <div class="news-text">
                        <h5>El var, ¿una ayuda o corrupcion?</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\palmer.jpg" alt="Noticia 3">
                    <div class="news-text">
                        <h5>De la mano de Palmer, Chelsea vuelve a zona de Champions</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\guardiola.jpg" alt="Noticia 3">
                    <div class="news-text">
                        <h5>¿Demaciados partidos? Esto dice Guardiola</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="imagenes\mbappe.webp" alt="Noticia 3">
                    <div class="news-text">
                        <h5>Mbappe,¿Su fichaje fue solo humo?</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <table class="info-table">
        <tr>
            <td class="imagen_gol">
                <img src="imagenes\goleadores.jpg" class="info-image">
            </td>
            <td class="info-text">
                <h1>Goleadores</h1>
                <p class="white-text">La UEFA Champions League ha visto a numerosos jugadores sobresalir como máximos goleadores a lo largo de su historia. El récord lo ostenta Cristiano Ronaldo, quien ha anotado más de 130 goles en la competición, destacándose por su increíble capacidad para marcar en momentos decisivos. Le sigue Lionel Messi, otro gigante del fútbol, con más de 120 goles, mostrando una consistencia impresionante en su rendimiento. Otros goleadores notables incluyen a Raúl González y Robert Lewandowski, quienes también han dejado una marca indeleble en el torneo. La lista de máximos goleadores refleja no solo la calidad individual de estos jugadores, sino también su capacidad para brillar en la plataforma más prestigiosa del fútbol europeo.</p>
            </td>
        </tr>
    </table>

    <br>

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
                <h3>Tambien visita</h3>
                <a href="#">UEFA.com</a>
                <a href="#">UEFA Foundation</a>
            </div>
            <div class="footer-social">
                <h3>Siguenos es</h3>
                <a href="#">X</a>
                <a href="#">Facebook</a>
                <a href="#">YouTube</a>
                <a href="#">Instagram</a>
            </div>
            <div class="footer-legal">
                <a href="#">Privacidad</a>
                <a href="#">Terminos y Condiciones</a>
                <a href="#">Cookie Policy</a>
                <a href="#">Cookie Settings</a>
                <p>&copy; 1998-2024 Felipe Monardes. Derechos Reservados</p>
            </div>
        </div>
    </footer>

    <div>
        <img src="imagenes\footer.png", class="imagen_footer">
    </div>

    <!-- Scripts de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
