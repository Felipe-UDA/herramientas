<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Administrar Registros</h2>

        <?php
        // Incluir la conexión a la base de datos
        include_once('conexion.php');
        $conn = conectar();

        // Incluir el módulo de actualización si se hace un POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_id'])) {
            include 'administracion/actualizar.php';  // Llamamos al archivo de actualización
        }

        // Mostrar tabla de registros
        $sql = "SELECT * FROM registro";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered mt-4'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>RUT</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id_usuario'] . "</td>
                            <td>" . $row['nombre'] . "</td>
                            <td>" . $row['apellido'] . "</td>
                            <td>" . $row['rut'] . "</td>
                            <td>" . $row['correo'] . "</td>
                            <td>
                                <a href='administrar_registro.php?id=" . $row['id_usuario'] . "' class='btn btn-sm btn-warning'>Editar</a>
                                <a href='eliminar.php?id_usuario=" . $row['id_usuario'] . "' class='btn btn-sm btn-danger'>Eliminar</a>
                            </td>
                        </tr>";
                }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>No hay registros disponibles.</div>";
        }

        // Mostrar formulario de edición si se pasa un 'id'
        if (isset($_GET['id'])) {
            $id_usuario = $_GET['id'];
            $sql = "SELECT * FROM registro WHERE id_usuario='$id_usuario'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
            <h3 class="mt-4">Editar Registro</h3>
            <form action="administrar_registro.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id_usuario']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="rut">RUT:</label>
                    <input type="text" class="form-control" name="rut" value="<?php echo $row['rut']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" name="correo" value="<?php echo $row['correo']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Nueva Contraseña (opcional):</label>
                    <input type="password" class="form-control" name="contraseña">
                </div>
                <button type="submit" class="btn btn-success">Actualizar Registro</button>
                <a href="administrar_registro.php" class="btn btn-secondary">Cancelar</a>
            </form>
        <?php
        }

        $conn->close();
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
