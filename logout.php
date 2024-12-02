<?php
session_start();
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

header('Location: inicio.php'); // Redirige al inicio o donde quieras
exit;
?>