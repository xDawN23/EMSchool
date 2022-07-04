<?php
    require_once 'conexion.php';
    session_start(); 

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] != "admin"){
      session_destroy();
      header("Location: login.php");
    }

?>
<!DOCTYPE html><html class="menu">
<html ng-app="EM-SCHOOL">

  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content=="IE=edge"/>
    <meta name="google" value="notranslate"/>
    <title>Administrador</title>
    <link rel="stylesheet" href="../css/registroAdmin.css">
    <link rel="stylesheet" href="../css/FormAdmin.css">
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../img/icono.png">
  </head>

  <body>
    
    <!--Header-->
    <header class="header">
      
    </header> 
    <!--Fin del Header-->

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <i class='bx bxs-school'></i>
          <div class="logo_name">EM-School</div>
        </div>
        <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav_list">
        <li>
          <a href="inicioAdmin.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Usuario</span>
          </a>
          <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="registroAdmin.php">
            <i class='bx bxs-folder'></i>
            <span class="links_name">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a href="serviciosAdmin.php">
            <i class='bx bxs-data'></i>
            <span class="links_name">Servicios</span>
          </a>
          <span class="tooltip">Servicios</span>
        </li>
        <li>
          <a href="prestamos.php">
            <i class='bx bx-music'></i>
            <span class="links_name">Préstamos</span>
          </a>
          <span class="tooltip">Préstamos</span>
        </li>
      </ul>
      </ul>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <!--<img src="profile.jpg" alt="">-->
            <div class="name_job">
              <div class="name">Prem Shahi</div>
              <div class="job">Web Designer</div>
            </div>
          </div>
          <a href="logout.php">
          <i class='bx bx-log-out' id="log_out"></i>
          </a>
        </div>
      </div>
    </div>
    <!--***************************************************************************************  -->
    <!-- REVISAR EN ESTE APARTADO, CÓMO BUSCAR POR EL CÓDIGO ESPECÍFICO DEL USUARIO QUE INGRESÓ. -->
    <!--***************************************************************************************  -->

    <div class="home_content"> 

    <div id="contenedor_carga">
      <div id="carga">
        
      </div>
    </div>

    <div class="padre">
        <div class="text hijo">
          <h2>Registro de usuarios</h2>
            <form class="form1" method="POST" action="registroUsuarios.php">
              <!--codigo, nombre, apellido,  telefono, correo, genero, contrasena, tipo_sangre, cargo, estatus-->
              <input type="text" name="codigo" placeholder="Código">
              <input type="text" name="nombre" placeholder="Nombre/s">
              <input type="text" name="apellido" placeholder="Apellidos">
              <input type="text" name="telefono" placeholder="Teléfono">
              <input type="email" name="correo" placeholder="Correo">
              <select name="genero">
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
              </select>
              <input type="password" name="contrasena" placeholder="Contraseña del usuario">                
              <select name="tipo_sangre">
              <option value="O-">O-</option>
              <option value="O+">O+</option>
              <option value="A-">A-</option>
              <option value="A+">A+</option>
              <option value="B-">B-</option>  
              <option value="B+">B+</option>
              <option value="AB-">AB-</option>
              <option value="AB+">AB+</option>
              </select>
              <select name="cargo">
              <option value="alumno">Alumno</option>
              <option value="maestro">Maestro</option>
              <option value="admin">Administrador</option>
              </select>
              <select name="estatus">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
              </select>
              <br>
              <input type="submit" value="Ingresar" class="submit btn btn1">
            </form>

          <!--Tabla de búsqueda  -->
          <?php 
          $data = mysqli_query($conexion, "SELECT * FROM persona ORDER By codigo");         
          ?>
        </div>

        <div class="hijo">
          <h3>Introduzca el código del usuario para interactuar</h3>
          <form action="eliminar.php" method="post">
            <input type="text" name="cod"> <br>
            <input type="submit" value="Eliminar usuario" name="btnBorrar" class="btn btn1">
          </form>

          <form action="modificar.php" method="post">
            <input type="text" name="cod"> <br>
            <input type="submit" value="Modificar datos" name="btnMod" class="btn btn1">
          </form>
        </div>
        
    </div>

          <div id = "datos">
              <table class="container">
                <thead>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Cargo</th>
                  <th>Estatus</th>
                </thead>
                <tbody>
                <?php while($usuario = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $usuario['codigo']?></td>
                      <td><?php echo $usuario['nombre']?></td>
                      <td><?php echo $usuario['apellido']?></td>
                      <td><?php echo $usuario['telefono']?></td>
                      <td><?php echo $usuario['correo']?></td>
                      <td><?php echo $usuario['cargo']?></td>
                      <td><?php echo $usuario['estatus']?></td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
        </div>
    <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>
        <div class="footer">
        <p> Todos los derechos reservados © 2021</p>
      </div>
    </div>
    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/registro.js"></script>
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");
  
    btn.onclick = function() {
      sidebar.classList.toggle("active");
      if(btn.classList.contains("bx-menu")){
        btn.classList.replace("bx-menu" , "bx-menu-alt-right");
      }else{
        btn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
    searchBtn.onclick = function() {
      sidebar.classList.toggle("active");
    }
    </script>

    <script>
      window.onload = function(){
        var contenedor = document.getElementById("contenedor_carga");

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
      }
    </script> 

</body>
</html>