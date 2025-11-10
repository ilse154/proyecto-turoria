<?php
session_start();
if (!isset($_SESSION['maestro'])) {
    header("Location: login_maestro.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido Maestro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f2f6;
      text-align: center;
      padding-top: 100px;
    }
    .logout {
      display: inline-block;
      background-color: #ff7675;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
    }
    .logout:hover {
      background-color: #d63031;
    }
  </style>
</head>
<body>
  <h2>👋 Bienvenido, <?php echo $_SESSION['maestro']; ?>!</h2>
  <p>Has iniciado sesión correctamente.</p>
  <a class="logout" href="logout.php">Cerrar sesión</a>
</body>
</html>
