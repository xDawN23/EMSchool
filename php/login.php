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
  <!--
  <div class="main">
    <p class="sign" align="center">Inicio de sesión</p>
    <?php if(isset($_SESSION['error_login'])): ?>
      <style>
        .error{
          text-align: center;
          display: inline;
        }
      </style>
    <?php endif; ?>
    <p class = "error " aling="center"> ¡Error al iniciar sesion! </p>

    <form class="form1" action="login-back.php" method="POST">
      <input class="un " type="text" align="center" name="codigo" placeholder="Código">
      <input class="pass" type="password" align="center" name="contrasena" placeholder="Contraseña">

      <input type="submit" value="Iniciar sesión" align ="center" class="submit">
    </div>
-->

    <div class="container px-4 py-5 mx-auto">
      <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <div class="row justify-content-center px-3 mb-3">
                            <img id="logo" src="https://i.imgur.com/PSXxjNY.png">
                        </div>
                        <h3 class="mb-5 text-center heading">We are Tidi</h3>

                        <h6 class="msg-info">Iniciar sesion con su cuenta</h6>

                        <form action="login-back.php" method="POST">
                        <div class="form-group">
                            <label class="form-control-label text-muted">Codigo</label>
                            <input type="text" name="codigo" placeholder="Codigo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label text-muted">Password</label>
                            <input type="password" name="contrasena" placeholder="Password" class="form-control">
                        </div>

                        <div class="row justify-content-center my-3 px-3">
                          <input type="submit" value="Iniciar sesión" class="submit btn-block btn-color submit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card card2">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">We are more than just a company</h3>
                    <small class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
                </div>
            </div>
        </div>
      </div>
    </div>
</body>
</html>

  