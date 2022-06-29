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
    <link rel="stylesheet" href="../css/calificaciones.css">
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
    <!--***************************************************************************************  -->
    <!--EMPIEZA EL APARTADO FUNCIONAL DEL SITIO, DONDE REALIZAMOS DIFERENTES CONSULTAS, COMO . -->
    <!--OBTENER EL CODIGO EL MAESTRO, Y SUS CLASES ASOCIADAS, PARA VERIFICAR SI PUEDEN SUBIRSE  -->
    <!--O NO LAS CALIFICACIONES.  -->
    <!--***************************************************************************************  -->
    <div class="home_content"> 
        <div class="text">
        
        <?php 
        $valor = $_SESSION['codigo'];
        //Obtenemos el codigo el maestro, para asi obtener los codigos de las materias a las que estan asociadas por el codigo.
        //SELECT cal.id_materia, m.id_materia FROM calificacion cal INNER JOIN maestro m ON cal.id_materia = m.id_materia WHERE m.id_docente = '$valor'
        $datos = mysqli_query($conexion, "SELECT * FROM `calificacion` WHERE id_docente = $valor;");
        //$arreglo = mysqli_fetch_assoc($datos);
        //echo($arreglo);
        ?>
        </div>
        <div id = "datos">
                  <?php
                  $array = array();
                  $tabla = 0;
                  $contador = 0;
                  ?>
                  <?php
                  //if ($calificacion['mostrar_calificacion'] == 1){
                    //for($i = 0 ; $i < sizeof($calificacion) ; $i++ ){echo ($calificacion['mostrar_calificacion']);}
                    while($dato = mysqli_fetch_array($datos)){
                      //echo ($calificacion['mostrar_calificacion']);
                      if ($tabla == 0 && $dato['mostrar_calificacion'] == 1) {?>
                      <h2>Calificaciones disponibles para subir</h2>
                        <table class="container">
                        <thead>
                          <th>Código de la materia</th>
                          <th>Código del alumno</th>
                          <th>Grupo</th>
                          <th>Salón</th>
                          <th>Evaluación</th>
                          <th>Guardar</th>
                          <th>Calificación</th>
                        </thead>
                        <tbody> 
                          <?php $tabla += 1;} ?> 
                    <tr>
                      <?php if ($dato['mostrar_calificacion'] == 1){ ?> 
                      <php>
                      <td><?php echo $dato['id_materia']?></td>
                      <td><?php echo $dato['id_alumno']; $array[$contador] = $dato['id_alumno'];?></td>
                      <td><?php echo $dato['grupo']?></td>
                      <td><?php echo $dato['salon']?></td>
                      <form action="guardarCalificacion.php" method = "POST">
                        <?php $id_alumno = $dato['id_alumno'];
                        $id_materia = $dato['id_materia'];
                        $calificacion = $dato['calificacion'];
                        $id_calificacion = $dato['id_calificacion'];
                        ?>
                        <td><input type="text" name = "calificacion"></td>
                        <!-- Es necesario colocar echo en value para enviar los valores. -->
                        <input type="hidden" name = "codigo_alumno" value =" <?php echo $id_alumno ?>">
                        <input type="hidden" name = "codigo_materia" value =" <?php echo $id_materia ?>">
                        <input type="hidden" name = "calificacion_vieja" value =" <?php echo $calificacion ?>">
                        <input type="hidden" name = "id_calificacion" value =" <?php echo $id_calificacion ?>">
                        <td><input type="submit" value="enviar"></td>
                      <td><?php echo $dato['calificacion']?></td>
                      </form>
                      <?php $contador++;?>
                    </tr>
                    <?php
                      }else{?><h2>Las calificaciones no están disponibles por el momento</h2><?php break;} 
                    }?>
                </tbody>
              </table>
        </div>
        <?php if(isset($_SESSION['mensaje'])){
          echo "<div>".$_SESSION['mensaje']."</div>";
          unset($_SESSION['mensaje']);
        }?>
      <div id="">
        </div>
        <div class="footer">
        <p> Todos los derechos reservados © 2021</p>
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