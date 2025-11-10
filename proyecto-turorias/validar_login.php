<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "turoria");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM Maestro WHERE Correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contrasena, $fila['Contrasena'])) {
        $_SESSION['maestro'] = $fila['Nombre'];
        header("Location: inicio_maestro.php");
        exit();
    } else {
        echo "<p style='text-align:center;color:red;'>❌ Contraseña incorrecta.</p>";
    }
} else {
    echo "<p style='text-align:center;color:red;'>❌ No existe una cuenta con ese correo.</p>";
}

$stmt->close();
$conexion->close();
?>
