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
    <link rel="stylesheet" href="../css/registroAlumno.css">
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
          <a href="pagos.php">
            <i class='bx bx-cart-alt' ></i>
            <span class="links_name">Pagos</span>
          </a>
          <span class="tooltip">Pagos</span>
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
        <div class = "text">
            <h3>Registro de materias</h3>
          Introduzca el código de la clase para inscribirse en ella</div>
        <?php 
        $valor = $_SESSION['codigo'];
        $query = mysqli_query($conexion, "SELECT * FROM materia"); 
        ?>
        <div id = "datos">
              <table class="container">
                <thead>
                  <th>Código de la materia</th>
                  <th>Nombre de la materia</th>
                  <th>Horario de la materia</th>
                  <th>Aula</th>
                  <th>Grupo</th>
                </thead>
                <tbody>
                <?php while($calificacion = mysqli_fetch_array($query)){?>
                    <tr>
                      <td><?php echo $calificacion['id_materia']?></td>
                      <td><?php echo $calificacion['nombre_materia']?></td>
                      <td><?php echo $calificacion['hora_inicio']?> - <?php echo $calificacion['hora_fin']?></td>
                      <td><?php echo $calificacion['aula']?></td>
                      <td><?php echo $calificacion['grupo']?></td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
          </div>
        <form action="registroMateria.php" method = "POST">
          <input type="text" name="codigo" value = "" placeholder = "Ingrese el código"> <br><br>
          <input type="submit" value="Inscribir"> <br><br><br>
        </form>

        <div class="text">
        <h3>Registro a eventos</h3>
          Introduzca el código del evento para inscribirte

        <?php $consulta = mysqli_query($conexion, "SELECT * FROM eventos;"); 
        
        while($dato = mysqli_fetch_array($consulta)){ ?>
        <table class="container">
                <thead>
                  <th>Nombre del evento</th>
                  <th>Código del evento</th>
                  <th>Descripción del evento</th>
                  <th>Código del docente encargado</th>
                  <th>Fecha del evento (A/M/D)</th>
                  <th>Hora del evento</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $dato['nombre_evento'];?></td>
                    <td><?php echo $dato['id_evento'];?></td>
                    <td><?php echo $dato['descripcion'];?></td>
                    <td><?php echo $dato['id_docente'];?></td>
                    <td><?php echo $dato['fecha'];?></td>
                    <td><?php echo $dato['hora'];?></td>
                  </tr>
                </tbody>
              </table>
        <?php } ?>

        <form action="registroEvento.php" method = "POST">
          <label>Ingrese el código del evento</label> <br>
          <input type="text" name="codigo" value = "" placeholder = "Código"> <br><br>
          <input type="submit" value="Inscribir"> <br><br><br>

        <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>

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

  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/inicioAlumno.js"></script>
</body>
</html>