<?php
    require_once 'conexion.php';
    session_start();

    //Valida que el usuario este logueado, además de que otros usuarios no puedan acceder a partes del sistema que no deberían poder acceder.

    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$codigo'"); 
    $usuario = mysqli_fetch_assoc($query);

    if($usuario['cargo'] != "alumno"){
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
    <title>Alumno</title>
    <link rel="stylesheet" href="../css/calificaciones.css">
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
          <a href="inicioAlumno.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Usuario</span>
          </a>
          <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="calificaciones.php">
            <i class='bx bx-book'></i>
            <span class="links_name">Calificaciones</span>
          </a>
          <span class="tooltip">Calificaciones</span>
        </li>
        <li>
          <a href="registro.php">
            <i class='bx bxs-folder'></i>
            <span class="links_name">Registro</span>
          </a>
          <span class="tooltip">Registro</span>
        </li>
        <li>
          <a href="servicios.php">
            <i class='bx bxs-data'></i>
            <span class="links_name">Servicios</span>
          </a>
          <span class="tooltip">Servicios</span>
        </li>
        <li>
          <a href="configuracion.php">
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
    <!--***************************************************************************************  -->
    <!-- REVISAR EN ESTE APARTADO, CÓMO BUSCAR POR EL CÓDIGO ESPECÍFICO DEL USUARIO QUE INGRESÓ. -->
    <!--***************************************************************************************  -->
    <div class="home_content"> 

    <div id="contenedor_carga">
      <div id="carga">
        
      </div>
    </div>

        <div class="text">Calificaciones del alumno
        <?php 
        $valor = $_SESSION['codigo'];
        $consulta = mysqli_query($conexion, "SELECT * FROM calificacion WHERE id_alumno LIKE '$valor'"); 
        //$calificacion = mysqli_fetch_assoc($consulta);
        ?>
          <div id = "datos">
            <?php $tabla = 0; 
            if ($tabla == 0){?>
            <table class="container">
              <thead>
              <th>Calificación</th>
              <th>Grupo</th>
              <th>Salón</th>
              <th>Código del alumno</th>
              <th>Código de la materia</th>
            </thead>
            <tbody>
              <?php $tabla = 1;
              }
              ?> 
                  <?php $contador = 0;
                  //if ($calificacion['mostrar_calificacion'] == 1){
                    //for($i = 0 ; $i < sizeof($calificacion) ; $i++ ){echo ($calificacion['mostrar_calificacion']);}
                    while($calificacion = mysqli_fetch_array($consulta)){
                      //echo ($calificacion['mostrar_calificacion']); ?>
                    <tr>
                      <?php if ($calificacion['mostrar_calificacion'] == 1){ ?>
                      <php $contador++;?>
                      <td><?php echo $calificacion['calificacion']?></td>
                      <td><?php echo $calificacion['grupo']?></td>
                      <td><?php echo $calificacion['salon']?></td>
                      <td><?php echo $calificacion['id_alumno']?></td>
                      <td><?php echo $calificacion['id_materia']?></td>
                      <?php  $prueba += $calificacion['mostrar_calificacion'];?>
                    </tr>
                    <?php
                      }else if($contador == 0)echo("Las calificaciones no están disponibles en este momento, intente en otra ocasión");$contador = 1;   
                    }
                    ?>
                </tbody>
              </table>
        </div>
        <div class="footer">
        <p> Todos los derechos reservados © 2021</p>
      </div>
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

    <script>
      window.onload = function(){
        var contenedor = document.getElementById("contenedor_carga");

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
      }
    </script> 

  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</body>
</html>
