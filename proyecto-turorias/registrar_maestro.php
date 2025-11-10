<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = new mysqli("localhost", "root", "", "turoria");

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    if (!isset($_POST['nombre'], $_POST['correo'], $_POST['contrasena'], $_POST['materia'])) {
        die("Error: faltan datos del formulario.");
    }

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $materia = $_POST['materia'];

    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Maestro (Nombre, Correo, Contrasena, Materia) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $hash, $materia);

    echo "<!DOCTYPE html><html lang='es'><head>
          <meta charset='UTF-8'>
          <title>Registro de Maestro</title>
          <style>
            body { font-family: Arial; text-align: center; background-color: #f9f9f9; margin-top: 100px; }
            a {
              display: inline-block;
              margin-top: 20px;
              padding: 10px 20px;
              background-color: #4b86b4;
              color: white;
              text-decoration: none;
              border-radius: 5px;
            }
            a:hover { background-color: #75aadb; }
          </style>
          </head><body>";

    if ($stmt->execute()) {
        echo "<h2>✅ Registro exitoso</h2>";
    } else {
        echo "<h2>❌ Error al registrar: " . $conexion->error . "</h2>";
    }

    echo "<a href='registro_maestro.html'>Registrar otro maestro</a>
          <a href='index.html'>Regresar a inicio</a>";

    echo "</body></html>";

    $stmt->close();
    $conexion->close();

} else {
    echo "Por favor, envía el formulario correctamente.";
}
?>
