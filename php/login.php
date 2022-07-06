<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="../img/icono.png">
  <link rel="stylesheet" href="../css/login.css">
  <title>Inicio de sesión</title>
</head>
<body>
<style>
  /* Código para el fondo del inicio de sesión. */
body {
  background-image: url('../img/fondo1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.error{
  display: none;
  color: red;
  font-weight: bold;
}
</style>
  <div class="main">
    <p class="sign" align="center">Inicio de sesión</p>
    <?php if(isset($_SESSION['error_login'])): ?>
      <style>
        .error{
          text-align: center;
          display: inline;
          margin-left: 120px;
        }
      </style>
    <?php endif; ?>
    <p class = "error " aling="center"> ¡Error al iniciar sesion! </p>

    <form class="form1" action="login-back.php" method="POST">
      <input class="un " type="text" align="center" name="codigo" placeholder="Código">
      <input class="pass" type="password" align="center" name="contrasena" placeholder="Contraseña">

      <input type="submit" value="Iniciar sesión" align ="center" class="submit">
    </div>


</body>
</html>

  