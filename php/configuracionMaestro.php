<?php
    require_once 'conexion.php';
    session_start();

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] != "maestro"){
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
    <title>Maestro</title>
    <link rel="stylesheet" href="../css/conf.css">
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
          <a href="inicioMaestro.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Usuario</span>
          </a>
          <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="calificacionesMaestro.php">
            <i class='bx bx-book'></i>
            <span class="links_name">Calificaciones</span>
          </a>
          <span class="tooltip">Calificaciones</span>
        </li>
        <li>
          <a href="registroMateriasMaestro.php">
            <i class='bx bxs-folder'></i>
            <span class="links_name">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a href="configuracionMaestro.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Configuración</span>
          </a>
          <span class="tooltip">Configuración</span>
        </li>
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
          <i class='bx bx-log-out' id="log_out" ></i>
          </a>
        </div>
      </div>
    </div>
    
    <div class="home_content"> 
      <div class="padre">
          
        <div class="hijo">
        <h2>Cambio de contraseña</h2> 
          <form action="newpass_prof.php" method="post">
            <?php
              $codigo = $_SESSION['codigo'];
            ?>
            <input type="text" name="old_pass" placeholder="Introduzca su contraseña actual"> <br> <br>

            <input type="text" name="new_pass" placeholder="Introduzca una contraseña nueva"> <br> <br>
            <input type="submit" value="Modificar Datos" name="btnMod" class="btn btn1">
          </form>
        </div>
        
      </div>
    </div>

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
   
   <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</body>
</html>