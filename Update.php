<?php
include_once "controller/conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

// Obtener el ID del registro
$id = $_GET['id'] ?? null;

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE registropersonas SET 
                Nombre = :nombre,
                Apellido = :apellido,
                Edad = :edad,
                Correo = :correo,
                Telefono = :telefono
            WHERE Id = :id";

    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php"); 
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
} else {
    // Obtener datos actuales del registro
    $sql = "SELECT * FROM registropersonas WHERE Id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$persona) {
        echo "Registro no encontrado.";
        exit;
    }
}
?>

<!-- HTML del formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Registro</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $persona['Nombre'] ?>">
        </div>
        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= $persona['Apellido'] ?>">
        </div>
        <div class="mb-3">
            <label>Edad</label>
            <input type="text" name="edad" class="form-control" value="<?= $persona['Edad'] ?>">
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="<?= $persona['Correo'] ?>">
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= $persona['Telefono'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
