<?php
    include_once 'conexion.php';
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
    <link rel="stylesheet" href="../css/inicioMaestro.css">
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
          <i class='bx bx-log-out' id="log_out"></i>
          </a>
        </div>
      </div>
    </div>
    <!--***************************************************************************************  -->
    <!-- REVISAR EN ESTE APARTADO, CÓMO BUSCAR POR EL CÓDIGO ESPECÍFICO DEL USUARIO QUE INGRESÓ. -->
    <!--***************************************************************************************  -->

    <div class="home_content"> 
        <div class="text">Bienvenido, maestro
        <?php 
        $valor = $_SESSION['codigo'];
        $query = mysqli_query($conexion, "SELECT * FROM persona WHERE codigo = '$valor'"); 
        $usuario = mysqli_fetch_assoc($query);
        echo $usuario['nombre'];
        ?></div>
        <h2>Datos generales del docente</h2>
          <div id = "datos">
              <table class="container">
                <thead>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cargo</th>
                  <th>Estatus</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $usuario['codigo'];?></td>
                    <td><?php echo $usuario['nombre'];?></td>
                    <td><?php echo $usuario['apellido'];?></td>
                    <td><?php echo $usuario['cargo'];?></td>
                    <td><?php echo $usuario['estatus'];?></td>
                  </tr>
                </tbody>
              </table>

    <?php 
    $codigo = $_SESSION['codigo'];
    $query = mysqli_query($conexion, "SELECT * FROM materia WHERE id_docente = '$codigo'"); 
    ?>
      <div id = "datos">
        <h2>Horario del docente</h2>
        <table class="container">
          <thead>
            <th>Código de la materia</th>
            <th>Nombre de la materia</th>
            <th>Horario de la clase</th>
            <th>Aula</th>
            <th>Grupo</th>
          </thead>
          <tbody>
            <?php while($maestro = mysqli_fetch_assoc($query)){?>
                  <tr>
                    <td><?php echo $maestro['id_materia'];?></td>
                    <td><?php echo $maestro['nombre_materia'];?></td>
                    <td><?php echo $maestro['hora_inicio'];?> - <?php echo $maestro['hora_fin'];?></td>
                    <td><?php echo $maestro['aula'];?></td>
                    <td><?php echo $maestro['grupo'];?></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
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
    
</body>
</html>