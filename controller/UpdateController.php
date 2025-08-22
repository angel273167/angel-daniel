<?php

include_once "conexion.php";
$conexion = new Conexion();
$conexion = $conexion->conectar();

if($conexion){
    try{
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$edad = $_POST['edad'];
$tel = $_POST['telefono'];

echo $id , $nombre;

$CONSULTA = "UPDATE `registropersonas` SET 
                                           `Id`='$id',
                                           `Nombre`='[$nombre]',
                                           `Apellido`='[$apellido]',`
                                           Edad`='[$edad]',`
                                           Correo`='[$correo]',`
                                           Telefono`='[$tel]' 
                                           WHERE 1";
    $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->execute();

        header("Location: ../Index.php?mensaje=Correcto");
        exit();

         } catch (PDOException $e) {
        // Código de error 23000 = violación de restricción (clave duplicada, etc.)
        if ($e->getCode() == 23000) {
            header("Location: ../Index.php?mensaje=Duplicado");
        } else {
            // Otro tipo de error
            header("Location: ../Index.php?mensaje=Error");
        }
        exit();
    }
} else {
    header("Location: ../Index.php?mensaje=SinConexion");
    exit();
}
?>
